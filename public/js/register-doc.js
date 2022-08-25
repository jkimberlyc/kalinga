var otherSpecialty = document.getElementById('specialization')
var addSpecialty = document.getElementById('addSpecialty')
var specialtySelect = document.getElementById("specializationSelect")

addSpecialty.addEventListener('click', () => {
    var specialty = otherSpecialty.value;

    if (specialty != "") {
        var div = document.createElement("div");
        div.innerHTML = "<span class='align-middle'>" + specialty.toUpperCase() + "</span>" + "<button type='button' class='btn btn-sm p-0 ps-1' style='color:#922c88' onclick='deleteItem(this)'><i class='uil uil-multiply'></i></button>";
        div.classList.add("align-middle", "px-3", "py-2", "rounded-5", "d-inline-block", "m-1", "specialty")
        div.setAttribute("data-label", "others");

        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "specialization[]";
        input.value = specialty.toUpperCase();

        div.appendChild(input)

        document.getElementById("specialties").appendChild(div);
        otherSpecialty.value = "";
    }
})

specialtySelect.addEventListener('change', () => {
    var specialty = specialtySelect.value;

    if (specialty != "") {
        var div = document.createElement("div");
        div.innerHTML = "<span class='align-middle'>" + specialty.toUpperCase() + "</span>" + "<button type='button' class='btn btn-sm p-0 ps-1' style='color:#922c88' onclick='deleteItem(this)'><i class='uil uil-multiply'></i></button>";
        div.classList.add("align-middle", "px-3", "py-2", "rounded-5", "d-inline-block", "m-1", "specialty")

        var input = document.createElement("input");
        input.type = "hidden";
        input.name = "specialization[]";
        input.value = specialty.toUpperCase();

        div.appendChild(input)

        document.getElementById("specialties").appendChild(div);

        specialtySelect.remove(specialtySelect.selectedIndex)
    }
})

function deleteItem(btn) {
    var item = btn.parentNode;
    item.remove();

    if (!btn.parentNode.hasAttribute('data-label')) {
        var option = document.createElement('option');
        option.innerHTML = btn.parentNode.textContent;
        option.value = btn.parentNode.textContent;
        specialtySelect.appendChild(option);
    }
}
