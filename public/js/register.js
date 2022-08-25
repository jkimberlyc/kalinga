var search = document.querySelector('#cityInput');
var results = document.querySelector('#cities');
var templateContent = document.querySelector('#cityList').content;
search.addEventListener('keyup', function handler(event) {
    while (results.children.length) results.removeChild(results.firstChild);
    var inputVal = new RegExp(search.value.trim(), 'i');
    var set = Array.prototype.reduce.call(templateContent.cloneNode(true).children, function searchFilter(frag, item, i) {
        if (inputVal.test(item.textContent) && frag.children.length < 8) frag.appendChild(item);
        return frag;
    }, document.createDocumentFragment());
    results.appendChild(set);
});


var search2 = document.querySelector('#provinceInput');
var results2 = document.querySelector('#provinces');
var templateContent2 = document.querySelector('#provinceList').content;
search2.addEventListener('keyup', function handler(event) {
    while (results2.children.length) results2.removeChild(results2.firstChild);
    var inputVal = new RegExp(search2.value.trim(), 'i');
    var set = Array.prototype.reduce.call(templateContent2.cloneNode(true).children, function searchFilter(frag, item, i) {
        if (inputVal.test(item.textContent) && frag.children.length < 8) frag.appendChild(item);
        return frag;
    }, document.createDocumentFragment());
    results2.appendChild(set);
});
