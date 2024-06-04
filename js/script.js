const msgErro = window.document.querySelector("#msg-erro");

setTimeout(() => {
    if (msgErro && msgErro.parentNode) {
        msgErro.parentNode.removeChild(msgErro);
    }
}, 8000);
