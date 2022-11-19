'use strict'

document.addEventListener("DOMContentLoaded", function () {
    console.log('app.js (main) loaded');

    let url = 'https://tradernet.ru/api?q={"cmd":"getMarketStatus","params":{"market":"ММВБ_АКЦ_Ф"}}';
    fetch(url).then(response =>
        response.json().then(data => ({
            data: data,
        })).then(res => {
            let inputData = res.data.result;
            for (let key in inputData) {
                if (inputData.hasOwnProperty(key)) {
                    document.getElementById('texts').innerHTML = inputData[key].t
                    let newArray = inputData[key].m;
                    for (let k in newArray) {
                        if (newArray.hasOwnProperty(k)) {
                            if (newArray[k].s === 'OPEN') {
                                document.getElementById('status').classList.add('ticksopen');
                            } else {
                                document.getElementById('status').classList.remove('ticksopen');
                            }
                            document.getElementById('status').innerHTML = newArray[k].s
                        }
                    }
                }
            }
        }));

    let getTickerstpl = {
        'cmd': 'getTopSecurities',
        'params': {
            'type': 'stocks',
            'exchange': 'russia',
            'gainers': 0,
            'limit': 30
        }
    };

    let APIURL = 'https://tradernet.ru/api?q={"cmd":"getTopSecurities","params":{"type":"stocks", "exchange":"russia", "gainers":"0", "limit":"30"}}'

    function getTickers(){
        return fetch(APIURL,
            {
                method: "GET",
                headers: {
                    'Accept': 'application/json',
                    'Content-Type': 'application/json',
                },
            })
            .then((response) => response.json())
            .then((responseData) => {
                return responseData;
            })
            .catch(error => console.warn(error));
    }

    getTickers().then(response => getResponse(response));

    function getResponse(evt) {
        for (let key in evt) {
            if (evt.hasOwnProperty(key)) {
                let tickersToWatchChanges = evt[key];
                console.log(tickersToWatchChanges)
                const results = document.getElementById('results');
                function testTpl() {
                    let tpl = '';
                    for (let i = 0; i < tickersToWatchChanges.length; i++) {
                        tpl += '<div class="ticker" data-ticker="' + tickersToWatchChanges[i] + '"><strong>' + tickersToWatchChanges[i] + '</strong>: <br>' +
                            '<div>' +
                            'Name: <span class="dName"></span> <br>' +
                            'Price: <span class="dPrice"></span> <br>' +
                            '<div class="showDPod">' +
                            'Change price of a day: <span class="dPoD"></span>' +
                            '</div>' +
                            '<div class="showDPercoD">' +
                            'Change price percent of a day: <span class="dPercoD"></span>' +
                            '</div>' +
                            '</div>' +
                            '</div>';
                    }

                    results.innerHTML = tpl;
                }

                testTpl();

                let currentPrice = ''

                function addLog(data) {
                    if (data['ltr'] || data['name']) {
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dName').innerHTML = data['ltr'] + ' | ' + data['name'];
                    }

                    if (data['ltp']) {
                        let newPrice = data['ltp'];
                        if ((currentPrice < newPrice) || (currentPrice > newPrice)) {
                            if (currentPrice < newPrice) {
                                // console.log('down');
                                results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').classList.add('trend-red');
                            } else {
                                // console.log('up')
                                results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').classList.add('trend-green');
                            }
                        }

                        function removeTrendClass() {
                            results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').classList.remove('trend-red', 'trend-green');
                        }

                        setTimeout(removeTrendClass, 1000);
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').innerHTML = data['ltp'];
                        currentPrice = newPrice;
                    } else {
                        // console.log('static');
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').style.color = 'black';
                    }

                    if (data['chg']) {
                        let dataChg = data['chg'];
                        // console.log(dataChg)
                        // console.log(data['ltp'])
                        // console.log(data['ltr'], data['name'])
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPoD').innerHTML = data['chg'];
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPoD').style.fontWeight = '700';
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPoD').style.color = dataChg > 0 ? 'green' : 'red';
                        let showDPoD = results.querySelector('[data-ticker="' + data['c'] + '"] .showDPod');
                        if ((dataChg > 0) || (dataChg < 0)) {
                            showDPoD.classList.add('row-visible')
                        } else {
                            showDPoD.classList.remove('row-visible')
                        }

                    }

                    if (data['pcp']) {
                        let dataChgPCP = data['pcp'];
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPercoD').innerHTML = data['pcp'];
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPercoD').style.fontWeight = '700';
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPercoD').style.color = data['pcp'] > 0 ? 'green' : 'red';
                        let showDPercoD = results.querySelector('[data-ticker="' + data['c'] + '"] .showDPercoD');
                        if ((dataChgPCP > 0) || (dataChgPCP < 0)) {
                            showDPercoD.classList.add('row-visible')
                        } else {
                            showDPercoD.classList.remove('row-visible')
                        }
                    }
                }

                const WS_SOCKETURL = 'wss://wss.tradernet.ru/?SID=lri3o90curhoqk6p104jm46vie',
                    // const WS_SOCKETURL = 'wss://wss.tradernet.ru',
                    ws = new WebSocket(WS_SOCKETURL);

                // шаблон ответа сокета
                let handlers = {
                    q: addLog
                };

                // запрос к сокету с параметрами
                ws.onopen = function (e) {
                    console.info("[ws open] Соединение установлено");
                    ws.send(JSON.stringify(['quotes', tickersToWatchChanges]));
                };

                // получаем ответ сокета
                ws.onmessage = function (m) {
                    let message = JSON.parse(m.data);
                    if (handlers[message[0]]) {
                        handlers[message[0]](message[1]);
                    }
                    // console.log(`[ws message] Получение данных с сервера...`);
                };

                ws.onclose = function (event) {
                    if (event.wasClean) {
                        console.log(`[ws close] Соединение закрыто чисто, код=${event.code} причина=${event.reason}`);
                    } else {
                        console.log('[ws close] Соединение прервано');
                    }
                };

                ws.onerror = function (error) {
                    console.log(`[ws error]`);
                };

            }
        }
    }
});
