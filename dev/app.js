const WebSocketsURL = "wss://wss.tradernet.ru";

const ws = new WebSocket(WebSocketsURL);

// Событие подключения
ws.onopen = function () {
    console.log('Connected to WS');
};


// Обрабатываем входящее сообщение
ws.onmessage = function (m) {
    const [event, data] = JSON.parse(m.data);
    console.log(event, data)
};

// Обрабатываем закрытие соединения
ws.onclose = function (e) {
    console.log('sockets closed', e);
};
/*
// Обрабатываем ошибку
ws.onerror = function (error) {
    console.log('Sockets.error: ', error);
    ws.close();
};

var tickersToWatchChanges = ['RSTI', 'GAZP', 'MRKZ', 'TATN', 'HYDR', 'MRKS', 'SBER','FEES', 'TGKA', 'VTBR','ANH.US', 'VICL.US', 'BURG.US', 'NBL.US', 'YETI.US', 'WSFS.US', 'NIO.US', 'DXC.US','MIC.US', 'HSBC.US', 'EXPN.EU', 'GSK.EU', 'SHP.EU', 'MAN.EU', 'DB1.EU', 'MUV2.EU', 'TATE.EU', 'KGF.EU', 'MGGT.EU', 'SGGD.EU'];
// console.log(tickersToWatchChanges);*/

/**
 * @param QuoteInfoAnswer[] data
 */
/*function updateWatcher(data) {
    data.forEach(console.info.bind(console));
}

ws.onmessage = function (m) {
    const [event, data] = JSON.parse(m.data);
    if (event === 'q') {
        updateWatcher(data);
    }
};
ws.onopen = function() { // Ждём открытия соединения
    // ws.send("quotes", JSON.stringify(['quotes', tickersToWatchChanges]));
};

(function websocketStart() {
    const ws = new WebSocket(WebSocketsURL);

    ws.onclose = function (e) {
        console.log('sockets closed', e);
        setTimeout(function () {
            websocketStart();
        }, 5000); // Попробуем подключиться через 5 секунд после разрыва
    };
})()*/