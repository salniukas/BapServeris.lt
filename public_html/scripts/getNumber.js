const req = (url, callback) => {
    let xhttp = new XMLHttpRequest();
    xhttp.onreadystatechange = _ => {
        if (xhttp.readyState == XMLHttpRequest.DONE) callback(xhttp);
    };
    xhttp.open("GET", url, true);
    xhttp.send();
};

req("https://api.mcsrvstat.us/2/mc.bapserveris.lt", (res) => {
    let text = JSON.parse(res.responseText);
    console.log(text);
    document.querySelector('.main .rectangle .n .r_fir').innerHTML = `${text.players.online}/`;
    document.querySelector('.main .rectangle .n .r_sec').innerHTML = `${text.players.max}`;
});