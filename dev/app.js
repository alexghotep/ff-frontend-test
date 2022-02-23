/*
var WebSocketsURL = "wss://wss.tradernet.ru";

var ws = new WebSocket(WebSocketsURL);

var tickersToWatchChanges = ["TRNFP", "TATNP", "AAPL.SPB", "TATN", "SU52001RMFS3", "SU29011RMFS2", "SU26216RMFS0", "SU26215RMFS2", "SU26212RMFS9", "SU26207RMFS9", "SU25077RMFS7"];

/!**
 * @param QuoteInfoAnswer[] data
 *!/
function updateWatcher(data) {
    data.forEach(console.info.bind(console));
}

ws.onmessage = function (m) {
    const [event, data] = JSON.parse(m.data);
    if (event === 'q') {
        updateWatcher(data);
    }
};
ws.onopen = function() { // Ждём открытия соединения
    ws.send("quotes", JSON.stringify(['quotes', tickersToWatchChanges]));
}
*/
