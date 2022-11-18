document.addEventListener("DOMContentLoaded", function () {
    console.log('app.js (main) loaded');

    let url = 'https://tradernet.ru/api?q=%7B%22cmd%22:%22getMarketStatus%22,%22params%22:%7B%22market%22:%22%D0%9C%D0%9C%D0%92%D0%91_%D0%90%D0%9A%D0%A6_%D0%A4%22%7D%7D';
    fetch(url).then(response =>
        response.json().then(data => ({
                data: data,
            })
        ).then(res => {
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

    let tickersToWatchChanges = [
        'RSTI', 'GAZP', 'MRKZ', 'RUAL', 'HYDR', 'MRKS', 'SBER', 'FEES', 'TGKA', 'VTBR', 'ANH.US', 'VICL.US', 'BURG.US', 'NBL.US', 'YETI.US', 'WSFS.US', 'NIO.US', 'DXC.US', 'MIC.US', 'HSBC.US', 'EXPN.EU', 'GSK.EU', 'SHP.EU', 'MAN.EU', 'DB1.EU', 'MUV2.EU', 'TATE.EU', 'KGF.EU', 'MGGT.EU', 'SGGD.EU'
    ];

    const results = document.getElementById('results');

    testTpl();

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

    let currentPrice = ''

    function addLog(data) {
        if (data['ltr'] || data['name']) {
            results.querySelector('[data-ticker="' + data['c'] + '"] .dName').innerHTML = data['ltr'] + ' | ' + data['name'];
        }

        if (data['ltp']) {
            let newPrice = data['ltp'];
            if ((currentPrice < newPrice) || (currentPrice > newPrice)) {
                if (currentPrice < newPrice) {
                    console.log('down');
                    results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').style.color = 'red';
                } else {
                    results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').style.color = 'green';
                    console.log('up')
                }
            }
            results.querySelector('[data-ticker="' + data['c'] + '"] .dPrice').innerHTML = data['ltp'];
            currentPrice = newPrice;
        } else {
            console.log('static');
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
});
