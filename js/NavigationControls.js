function getCookieValue(cookieId)
{
    var cookiestring=RegExp(cookieId+"=[^;]+").exec(document.cookie);
    return decodeURIComponent(!!cookiestring ? cookiestring.toString().replace(/^[^=]+./,"") : "");
}
function getCookieById(cookieId)
{
    return RegExp(cookieId+"=[^;]+").exec(document.cookie);
}

function setContentId(control)
{
    if (document.cookie.length > 0) {
        var viewID = getCookieById("viewID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var contentID = 'contentID=' + control.getAttribute("data-name");
        document.cookie = contentID;

        var requestData = pageID + viewID + familyID + contentID;

        var request = new XMLHttpRequest();
        request.open('GET', './php/UpdatePage.php?' + requestData, false);
        request.send(null);

        if (request.status == 200) {
            document.getElementById("mainContent").innerHTML = request.responseText;
        }
    }
}

function setArticleId(control)
{
    if (document.cookie.length > 0) {
        var contentID = getCookieById("contentID") + '&';
        var viewID = getCookieById("viewID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var pageID = 'pageID=article&';

        var articleId = 'articleId=' + control.getAttribute("data-id");

        var requestData = contentID + pageID + viewID + familyID + articleId;

        var request = new XMLHttpRequest();
        request.open('GET', './php/UpdatePage.php?' + requestData, false);
        request.send(null);

        if (request.status == 200) {
            document.getElementById("mainContent").innerHTML = request.responseText;
        }
    }
}

function setViewId(control)
{
    var id = control.getAttribute("data-id");
    if (document.cookie.length > 0 ) {
        var contentID = getCookieById("contentID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var viewID = 'viewID=' + id;
        document.cookie = viewID;

        var requestData = contentID + pageID + familyID + viewID;

        var request = new XMLHttpRequest();
        request.open('GET', './php/UpdatePage.php?' + requestData, false);
        request.send(null);

        if (request.status == 200) {
            document.getElementById("mainContent").innerHTML = request.responseText;
        }
    }
}

function setFamilyId(control)
{
    var id = control.getAttribute("data-id");

    if (document.cookie.length > 0 && id > 0) {

        var contentID = getCookieById("contentID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var viewID = getCookieById("viewID") + '&';
        var familyID = 'familyID=' +  id;

        document.cookie = familyID;

        var requestData = contentID + pageID + viewID + familyID;

        var request = new XMLHttpRequest();
        request.open('GET', './php/UpdatePage.php?' + requestData, false);
        request.send(null);

        if (request.status == 200) {
            document.getElementById("mainContent").innerHTML = request.responseText;
        }
    }
}

function searchByWord(control){
    var request = new XMLHttpRequest();
    request.open('POST','searchContent.php?contentID='+control.value+'',false);
    request.send();
}

var treebtns = document.getElementsByClassName('treeButton');
if (treebtns.length >= 1) {
    for (var i = 0; i < treebtns.length; i++) {
        treebtns[i].addEventListener('click', function() {
                    setFamilyId(treebtns[i]);
            },false);
    }
}

//document.querySelectorAll('.dropdown-item').forEach(item => {
    //item.onclick = setViewId( item.getAttribute("data-id") );
    //item.addEventListener('click', event => {
    //    setViewId(item.getAttribute("data-id"));
    //})
//})
