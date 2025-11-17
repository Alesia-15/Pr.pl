function getCookie(name) {
    function escape(s) { return s.replace(/([.*+?\^${}()|\[\]\/\\])/g, '\\$1'); };
    var match = document.cookie.match(RegExp('(?:^|;\\s*)' + escape(name) + '=([^;]*)'));

    return match ? match[1] : null;
}

// https://github.com/alexfedoseev/sourcebuster-js
// https://www.it-agency.ru/academy/tools/sourcebuster/
sbjs.init();
if (getCookie("utm_source") === null ) {
    //sbjs.init();
    var maxage = 60*60*24*365,
        UtmMedium = sbjs.get.current.typ === 'typein' || sbjs.get.current_add.ep === 'https://privoz.pl/' ? 'direct' : 'articles-privoz';
    document.cookie = "utm_source="+sbjs.get.current.src+"; path=/; domain=.privoz.pl; max-age="+maxage;
    document.cookie = "utm_medium="+UtmMedium+"; path=/; domain=.privoz.pl; max-age="+maxage;
    document.cookie = "utm_content="+encodeURIComponent(window.location)+"; path=/; domain=.privoz.pl; max-age="+maxage;
    console.log(sbjs.get);
    console.log('referer - ' + sbjs.get.current.src);
}
if (sbjs.get.first_add.ep === 'https://privoz.pl/') {
    document.cookie = "utm_medium=direct; path=/; domain=.privoz.pl; max-age="+60*60*24*365;
}
console.log('referer - ' + sbjs.get.current.src);

function parseUrlQuery() {
    let data = {};
    if(location.search) {
        var pair = (location.search.substr(1)).split('&');
        for(var i = 0; i < pair.length; i ++) {
            let param = pair[i].split('=');
            data[param[0]] = param[1];
        }
    }

    return data;
}

function getUrlQueryByName(name) {
    var parseUrl = parseUrlQuery();

    for (const key in parseUrl) {
        var param = parseUrl[name];
    }

    return param ? param : null;
}

function hasUTM(name) {
    var utm = getCookie(name) ? getCookie(name) : getUrlQueryByName(name);

    return utm ? utm : '';
}

function setLink() {
    var links       = document.getElementsByClassName('utm-link'),
        utmSource   = hasUTM('utm_source'),
        utmMedium   = hasUTM('utm_medium'),
        utmTerm     = hasUTM('utm_term'),
        utmContent  = hasUTM('utm_content'),
        utmCampaign = hasUTM('utm_campaign');

    for (const key in links) {
        let link = links[key];

        if (link.search == '') {
            link.href = link.href + '?utm_source=' + utmSource + '&utm_medium=' + utmMedium + '&utm_term=' + utmTerm + '&utm_content=' + utmContent + '&utm_campaign=' + utmCampaign;
        }
    }
}
setLink()