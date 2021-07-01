var page = 1;

while (true) {
    fetchFavorite(page)

    if (page === 30) {
        break;
    }

    page++;
}

function fetchFavorite(page) {
    var favoriteLink = "https://kidega.com/hesabim/favoriler?page=" + page

    fetch(favoriteLink).then(function (response) {
        return response.text();
    }).then(function (html) {

        var parser = new DOMParser();
        var doc = parser.parseFromString(html, 'text/html');
        var favoriteList = doc.querySelector('.favoriteList');
        var lists = favoriteList.getElementsByTagName("li");

        for (var i = 0; i < lists.length; ++i) {
            tmpTitle = lists[i].querySelector(".f16");
            tmpAuthor = lists[i].querySelector(".author");
            console.log(tmpTitle.innerText, '-', tmpAuthor.innerText)
        }

        if (lists.length === 0) {
            return false;
        }

        page++;

    }).catch(function (err) {
        console.warn('Something went wrong.', err);
    });
}