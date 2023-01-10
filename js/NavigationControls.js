function getCookieValue(cookieId)
{
    var cookiestring=RegExp(cookieId+"=[^;]+").exec(document.cookie);
    return decodeURIComponent(!!cookiestring ? cookiestring.toString().replace(/^[^=]+./,"") : "");
}
function getCookieById(cookieId)
{
    return RegExp(cookieId+"=[^;]+").exec(document.cookie);
}

function request(data)
{
    // alert(data);

    var request = new XMLHttpRequest();
    request.open('GET', './php/UpdatePage.php?' + data, false);
    request.send(null);

    if (request.status == 200)
    {
        document.getElementById("mainContent").innerHTML = request.responseText;
    }
}

function setContentId(control)
{
    if (document.cookie.length > 0)
    {
        var viewID = getCookieById("viewID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var contentID = 'contentID=' + control.getAttribute("data-name");
        document.cookie = contentID;

        request(pageID + viewID + familyID + contentID);
    }
}

function setArticleId(control)
{
    if (document.cookie.length > 0)
    {
        var contentID = getCookieById("contentID") + '&';
        var viewID = getCookieById("viewID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var pageID = 'pageID=article&';
        var articleId = 'articleId=' + control.getAttribute("data-id");

        request(contentID + pageID + viewID + familyID + articleId);
    }
}

function setViewId(control)
{
    var id = control.getAttribute("data-id");

    if (document.cookie.length > 0 )
    {
        var contentID = getCookieById("contentID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var viewID = 'viewID=' + id;
        document.cookie = viewID;

        request(contentID + pageID + familyID + viewID );
    }
}

function setFamilyId(control)
{
    var id = control.getAttribute("data-id");

    if (document.cookie.length > 0 && id > 0)
    {
        var contentID = getCookieById("contentID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var viewID = getCookieById("viewID") + '&';
        var familyID = 'familyID=' +  id;
        document.cookie = familyID;

        request(contentID + pageID + viewID + familyID);
    }
}

function searchEvent()
{
    if (document.cookie.length > 0)
    {
        var viewID = getCookieById("viewID") + '&';
        var contentID = getCookieById("contentID") + '&';
        var pageID = getCookieById("pageID") + '&';
        var familyID = getCookieById("familyID") + '&';
        var searchRequest = 'searchRequest=' + $('#searchText').val();
        document.cookie = searchRequest;

        request(pageID + viewID + familyID + contentID + searchRequest);
    }
}

function alertValue(v){
    alert(v);
}

var treebtns = document.getElementsByClassName('treeButton');
if (treebtns.length >= 1) {
    for (var i = 0; i < treebtns.length; i++) {
        treebtns[i].addEventListener('click', function() {
                    setFamilyId(treebtns[i]);
            },false);
    }
}
