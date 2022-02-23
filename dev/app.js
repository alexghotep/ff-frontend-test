const WebSocketsURL = "wss://wss.tradernet.ru";

const ws = new WebSocket(WebSocketsURL);

// Событие подключения
ws.onopen = function () {
    console.log('Connected to WS');
};


ws.onopen = function() { // Ждём открытия соединения
    ws.send(JSON.stringify(['quotes', ['RSTI', 'GAZP', 'MRKZ', 'RUAL', 'HYDR', 'MRKS', 'SBER', 'FEES', 'TGKA', 'VTBR', 'ANH.US', 'VICL.US', 'BURG.US', 'NBL.US', 'YETI.US', 'WSFS.US', 'NIO.US', 'DXC.US', 'MIC.US', 'HSBC.US', 'EXPN.EU', 'GSK.EU', 'SHP.EU', 'MAN.EU', 'DB1.EU', 'MUV2.EU', 'TATE.EU', 'KGF.EU', 'MGGT.EU', 'SGGD.EU']]));
};

// Обработка входящих данных
function quotesHandler(data) {
    console.log(data);
}

const handlers = {
    q: quotesHandler
};

ws.onmessage = function (m) {
    const [event, data] = JSON.parse(m.data);
    handlers[event](data);
};