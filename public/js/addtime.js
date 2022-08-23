// let addTime = document.getElementById("addTime");
// let timeDisplay = document.getElementById("timeDisplay");

// document.getElementById("addTime").addEventListener("click", () => {
//     let div = document.createElement("div");
//     let button = document.createElement("button");
//     button.innerHTML = "Add";

//     div.innerHTML =
//         "<input type='time' id='timeInput'/> <button onClick='add()'>Add</button>";
//     let addDiv = document.getElementById("addDiv");
//     addDiv.innerHTML = "";
//     addDiv.appendChild(div);

//     addDiv.innerHTML =
//         addDiv.innerHTML +
//         "<button type='button' id='addTime'>Add Time</button>";

//     // alert("hello");
// });

// function add() {
//     let timeInput = document.getElementById("timeInput").value;
//     timeDisplay.append(timeInput);
//     addDiv.innerHTML = "";
//     addDiv.innerHTML = "<button type='button' id='addTime'>Add Time</button>";
// }

function insertHome() {
    //insert Home before a specific child
    let input = document.getElementById("input-list").value;
    let liHome = document.createElement("h6");
    liHome.innerHTML = input;

    menu.insertBefore(liHome, menu.children[0]);
}

let m = document.getElementById("menu");

let li = document.createElement("h6");
li.textContent = "Home";
menu.replaceChild(li, menu.children[1]);
