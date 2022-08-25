// const btn = document.querySelector(".btn-show");

// btn.addEventListener('mouseenter', () => {
//     document.querySelector(".icon").classList.add("bx-tada");
//     btn.classList.replace("rounded-0", "rounded-1");
//     btn.classList.remove("highlight");
//     btn.style.transition = "0.3s ease-in"

// })

// btn.addEventListener('mouseout', () => {
//     btn.classList.add("highlight");
//     btn.classList.replace("rounded-1", "rounded-0");
//     document.querySelector(".icon").classList.remove("bx-tada");
// })

var search = document.querySelector('#locationInput');
var results = document.querySelector('#locations');
var templateContent = document.querySelector('#locationList').content;
search.addEventListener('keyup', function handler(event) {
    while (results.children.length) results.removeChild(results.firstChild);
    var inputVal = new RegExp(search.value.trim(), 'i');
    var set = Array.prototype.reduce.call(templateContent.cloneNode(true).children, function searchFilter(frag, item, i) {
        if (inputVal.test(item.textContent) && frag.children.length < 8) frag.appendChild(item);
        return frag;
    }, document.createDocumentFragment());
    results.appendChild(set);
});

// var search2 = document.querySelector('#specializationInput');
// var results2 = document.querySelector('#specializations');
// var templateContent2 = document.querySelector('#specializationList').content;
// search2.addEventListener('keyup', function handler(event) {
//     while (results2.children.length) results2.removeChild(results2.firstChild);
//     var inputVal = new RegExp(search2.value.trim(), 'i');
//     var set = Array.prototype.reduce.call(templateContent2.cloneNode(true).children, function searchFilter(frag, item, i) {
//         if (inputVal.test(item.textContent) && frag.children.length < 8) frag.appendChild(item);
//         return frag;
//     }, document.createDocumentFragment());
//     results2.appendChild(set);
// });
