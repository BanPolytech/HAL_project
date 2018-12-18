

$(document).ready(function(){

    var button = document.getElementById("submit");

    button.addEventListener("click", function(){

        var title = document.getElementById("title").value;
        var author = document.getElementById("author").value;
        var isbn = document.getElementById("isbn").value;
        var keyword = document.getElementById("keyword").value;
        var language = document.getElementById("language").value;
        var laboratory = document.getElementById("laboratory").value;
        var university = document.getElementById("university").value;

        //build url
        var url = "http://api.archives-ouvertes.fr/search/?";
        var fl = "authLastNameFirstName_s,docid,thumbId_i,title_s";
        var wt = "json";

        //build request
        var request = "";

        if (title !== "") {
            var tit = "title_t:" + title;
            request += tit;

            if (author !== "") {
                var auth = "&fq=auth_t:" + author;
                request += auth;
            }

            if (isbn !== "") {
                var isb = "&fq=isbn_s:" + isbn;
                request += isb;
            }

            if (keyword !== "") {
                var keys = "&fq=*_keyword_s:" + keyword;
                request += keys;
            }

            if (language !== "") {
                var lang = "&fq=language_t:" + language;
                request += lang;
            }

            if (laboratory !== "") {
                var lab = "&fq=labStructName_t" + laboratory;
                request += lab;
            }

            if (university !== "") {
                var univ = "&fq=structName_t" + university;
                request += univ;
            }
        }

        console.log(request);

        var xhr = new XMLHttpRequest();
        xhr.open("POST", url, true);
        xhr.responseType = 'json';

        xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded")


        xhr.onload = function(e) {
            var responseDiv = document.getElementById("response");
            if (this.status === 200) {
                var docs = this.response.response.docs;

                responseDiv.innerHTML = "<table class='table table-striped'><tbody>";

                if (docs.length === 0) {
                    responseDiv.innerHTML += "<tr><td>Aucune réponse</td></tr>";
                } else {

                    for(var key in docs) {

                        responseDiv.innerHTML += docGen(docs[key]);
                        docStore(docs[key]);

                    }
                }

                responseDiv.innerHTML += "</tbody></table>";

            } else {
                responseDiv.innerHTML = this.response.reason;
            }
        };

        xhr.send("q=" + request + "&fl=" + fl + "&wt=" + wt);

    });

});

function docGen(doc) {
    console.log(doc);
    var r = "<tr><td><div class='media'>";
    r += "<p>Le document n°" + doc.docid + "</p>";
    r += "<div class='media-body'>";
    if (doc.title_s) {
        r += "<h3>" + doc.title_s[0] + "</h3>";
    }
    r += "</div>";
    if (doc.thumbId_i) {
        r += "<img class='media-object img-thumbnail' style='width: 50px;'' src='http://thumb.ccsd.cnrs.fr/" + doc.thumbId_i +"'>";
    }
    r += "<br><ul class='list-group'>";
    for(var key in doc.authLastNameFirstName_s) {

        r += "<li class='list-group-item'>" + doc.authLastNameFirstName_s[key] + "</li>";

    }
    r += "</ul></div></td></tr>";
    return r;
}

function docStore(doc) {


    var xhr = new XMLHttpRequest();
    xhr.open("POST", BASE_URL + "/storeArticle.php", true);

    xhr.setRequestHeader("Content-type", "application/json");

    xhr.send(JSON.stringify({
        "title": doc.title_s,
        "author": doc.authLastNameFirstName_s,
        "docid" : doc.docid,
        "thumbid" : doc.thumbId_i
    }));

    xhr.onload = function (e) {
        console.log("onload");
    }
}