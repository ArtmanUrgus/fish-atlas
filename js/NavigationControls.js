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
        var contentID = 'contentID=' + control.getAttribute("name");
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

        var articleName = 'articleName=' + control.getAttribute("value");

        var requestData = contentID + pageID + viewID + familyID + articleName;

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
    if (document.cookie.length > 0) {
        var contentID = getCookieById("contentID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var viewID = 'viewID=' + control.getAttribute("name");
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
    if (document.cookie.length > 0) {

        var contentID = getCookieById("contentID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var viewID = getCookieById("viewID") + '&';
        var familyID = 'familyID=' +  control.getAttribute("value");
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

function searchForContent(control){

    var request = new XMLHttpRequest();
    request.open('GET','searchContent.php?contentID='+control.value+'',false);
    request.send();

    if (request.status==200) {

    }
}