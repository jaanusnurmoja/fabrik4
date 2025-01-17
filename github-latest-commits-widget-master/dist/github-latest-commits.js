// Generated by CoffeeScript 1.6.3
/*
 Helper to parse query string params
*/


(function() {
        $.extend({
            getUrlVars: function() {
                var hash, hashes, i, vars;
                vars = [];
                hash = void 0;
                hashes = window.location.href.slice(window.location.href.indexOf("?") + 1).split("&");
                i = 0;
                while (i < hashes.length) {
                    hash = hashes[i].split("=");
                    vars.push(hash[0]);
                    vars[hash[0]] = hash[1];
                    i++;
                }
                return vars;
            },
            getUrlVar: function(name) {
                return $.getUrlVars()[name];
            }
        });

        $(function() {
            var xmlhttp = new XMLHttpRequest();
            xmlhttp.overrideMimeType("application/json");
            xmlhttp.onload = function() {
                if (xmlhttp.status == 200) {
                    var commits = JSON.parse(xmlhttp.responseText);
                    var widget = document.getElementById('commit-history');
                    let thisHtml = "";
                    commits.values.forEach((commit, idx) => {
                      /* The first 2 commits in the public repo are phantoms created while creating the public repo, so ignore */
                        if (idx < 2) return;
                        thisHtml += "<li class=\"clearfix\">\n";
                        if (commit?.author?.user?.links?.avatar) {
                          thisHtml += 
                            "<div class=\"left\">\n" +
                            "   <img class=\"commit-avatar\" src=\"" + escape(commit.author.user.links.avatar.href) + "\">\n" +
                            "</div>\n";
                        } 
                        let author = commit?.author?.user?.nickname ?? commit?.author?.user?.display_name ?? 'unnamed';
                        thisHtml += 
                            "<div class=\"commit-author-info left\">\n" +
                            "   <a href=\"" + commit.links.html.href + "\"><b class=\"commit-author\">" + author + "</b></a>\n<br />\n" +
                            "   <b class=\"commit-date\">" + ($.timeago(commit.date)) +
                            "   <i class=\"commit-hash\">SHA: " + commit.hash.slice(0, 6) + "</i></b>\n<br />\n" +
                            commit.message + 
                            "</div>\n" +
                            "</li>";
                    });
                    widget.innerHTML = thisHtml;
                 } else {
                    console.log("There was an error: " + xmlhttp.status);
                }
            };
            var url = "https://api.bitbucket.org/2.0/repositories/fabrikar/publicfabrik/commits";
            xmlhttp.open('GET', url);
            xmlhttp.setRequestHeader("Accept", "application/json")
            xmlhttp.send();
        });
    }).call(this);
