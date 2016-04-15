function preview (content) {
    var win = window.open('', '_blank', '');
    win.document.open("text/html", "replace");
    win.opener = null;
    win.document.write(content);
    win.document.close();
}
