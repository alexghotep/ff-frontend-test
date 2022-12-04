'use strict'
import SimpleBar from "simplebar";

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

    function getTickers() {
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
                // console.log(tickersToWatchChanges)
                const results = document.getElementById('results');

                function testTpl() {
                    let tpl = '';
                    for (let i = 0; i < tickersToWatchChanges.length; i++) {
                        tpl += '<div class="ticker" data-ticker="' + tickersToWatchChanges[i] + '" style="background-image: url(https://tradernet.ru/logos/get-logo-by-ticker?ticker=' + tickersToWatchChanges[i].toLowerCase() + ')"><strong>' + tickersToWatchChanges[i] + '</strong>: <br>' +
                            '<div>' +
                            'Name: <span class="loadingName"><img src="images/loading.svg" alt=""></span> <br>' +
                            'Price: <span class="loadingPrice"><img src="images/loading.svg" alt=""></span> <br>' +
                            '<div class="showDPod">' +
                            'Change price of a day: ' +
                            '</div>' +
                            '<div class="showDPercoD">' +
                            'Change price percent of a day: ' +
                            '</div>' +
                            '</div>' +
                            '</div>' +
                            '<div class="list-item" data-ticker="' + tickersToWatchChanges[i] + '">' +
                            '<div class="list-item__line list-item__line_top">' +
                            '<div class="list-item__line_top--left">' +
                            '<img src="https://tradernet.ru/logos/get-logo-by-ticker?ticker=' + tickersToWatchChanges[i].toLowerCase() + '" alt="' + tickersToWatchChanges[i] + '">' +
                            '<span class="list-item__exchange-name"> ' + tickersToWatchChanges[i] + ' </span>' +
                            '<span class="list-item__exchange-term list-item__exchange-term_blue">long</span>' +
                            '<span class="list-item__exchange-term list-item__exchange-term_red">short</span>' +
                            '<span class="list-item__ring-icon"><svg width="17" height="17" viewBox="0 0 17 17" fill="none"\n' +
                            '                                             xmlns="http://www.w3.org/2000/svg"><rect x="0.138672" y="0.0671387"\n' +
                            '                                                                                      width="16" height="16" rx="8"\n' +
                            '                                                                                      fill="#007AFF"/>\n' +
                            '<g clip-path="url(#clip0_40_322)"><path\n' +
                            '    d="M8.13883 3.90047C7.79383 3.90047 7.51383 4.18047 7.51383 4.52547V4.81519C6.43592 5.0931 5.63883 6.06922 5.63883 7.23381V9.73381L4.8055 10.5671V10.9838H11.4722V10.5671L10.6388 9.73381V7.23381C10.6388 6.06922 9.84175 5.09392 8.76383 4.816V4.52547C8.76383 4.18047 8.48383 3.90047 8.13883 3.90047H8.13883ZM7.3055 11.4005C7.3055 11.8609 7.67883 12.2338 8.13883 12.2338C8.59883 12.2338 8.97217 11.8605 8.97217 11.4005H7.3055Z"\n' +
                            '    fill="white"/></g><defs><clipPath id="clip0_40_322"><rect width="10" height="10" fill="white"\n' +
                            '                                                              transform="translate(3.13867 3.06714)"/></clipPath></defs></svg></span>' +
                            '</div>' +
                            '<div class="list-item__line_top--right">' +
                            '<span class="list-item__value  list-item__value_positive dPrice">51.80</span>' +
                            '</div>' +
                            '</div>' +
                            '<div class="list-item__line list-item__line_bottom">' +
                            '<div class="list-item__line_bottom--left  list-item__exchange-title"><span class="dName"></span></div>' +
                            '<div class="list-item__line_bottom--right">' +
                            '<span class="list-item__percents dPoD">00.00</span>' +
                            '<span class="list-item__percents dPercoD">0.00%</span>' +
                            '</div>' +
                            '</div>' +
                            '</div>'
                        ;
                    }

                    results.innerHTML = tpl;
                }

                testTpl();

                let currentPrice = ''

                function addLog(data) {
                    if (data['ltr'] || data['name']) {
                        results.querySelector('[data-ticker="' + data['c'] + '"] .loadingName').classList.add('loaded');
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dName').innerHTML = data['ltr'] + ' | ' + data['name'];

                    }

                    if (data['ltp']) {
                        results.querySelector('[data-ticker="' + data['c'] + '"] .loadingPrice').classList.add('loaded');
                        let newPrice = data['ltp'];
                        if ((currentPrice < newPrice) || (currentPrice > newPrice)) {
                            if (currentPrice < newPrice) {
                                results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').classList.add('trend-red');
                            } else {
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
                        // results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').style.color = 'white';
                    }

                    if (data['chg']) {
                        let dataChg = data['chg'];
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPoD').innerHTML = data['chg'];
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
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPercoD').innerHTML = data['pcp'] + '%';
                        results.querySelector('[data-ticker="' + data['c'] + '"] .dPercoD').style.color = data['pcp'] > 0 ? 'green' : 'red';
                        let showDPercoD = results.querySelector('[data-ticker="' + data['c'] + '"] .showDPercoD');
                        if ((dataChgPCP > 0) || (dataChgPCP < 0)) {
                            showDPercoD.classList.add('row-visible')
                        } else {
                            showDPercoD.classList.remove('row-visible')
                        }
                    }
                }

                // const WS_SOCKETURL = 'wss://wss.tradernet.ru/?SID=lri3o90curhoqk6p104jm46vie',
                const WS_SOCKETURL = 'wss://wss.tradernet.ru',
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
