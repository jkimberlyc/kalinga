function pending() {
  let title = document.getElementById("tableTitle");
  title.innerHTML = "Pending Appointment";
  let pending = document.getElementById("appointmentTable");

  let tr = document.createElement("tr");
  let name = document.createElement("td");
  let age = document.createElement("td");
  let symptomps = document.createElement("td");
  let schedule = document.createElement("td");
  let address = document.createElement("td");
  let contactNum = document.createElement("td");
  //
  name.innerHTML = "Robin Paje";
  name.setAttribute("data-label", "Patient Name");
  age.innerHTML = "29";
  age.setAttribute("data-label", "Age");
  symptomps.innerHTML = "Migraine";
  symptomps.setAttribute("data-label", "Symptomps");
  schedule.innerHTML = "8-25-2022";
  schedule.setAttribute("data-label", "Schedule");
  address.innerHTML = "Caloocan City";
  address.setAttribute("data-label", "Address");
  contactNum.innerHTML = "133654987213";
  contactNum.setAttribute("data-label", "Contact No.");
  //
  pending.innerHTML = "";
  pending.appendChild(tr);
  tr.appendChild(name);
  tr.appendChild(age);
  tr.appendChild(symptomps);
  tr.appendChild(schedule);
  tr.appendChild(address);
  tr.appendChild(contactNum);
}

pending();

function complete() {
  let title = document.getElementById("tableTitle");
  title.innerHTML = "Completed";
  let complete = document.getElementById("appointmentTable");
  //
  let tr = document.createElement("tr");
  let name = document.createElement("td");
  let age = document.createElement("td");
  let symptomps = document.createElement("td");
  let schedule = document.createElement("td");
  let address = document.createElement("td");
  let contactNum = document.createElement("td");
  //
  name.innerHTML = "Robin test";
  name.setAttribute("data-label", "Patient Name");
  age.innerHTML = "29";
  age.setAttribute("data-label", "Age");
  symptomps.innerHTML = "Migraine";
  symptomps.setAttribute("data-label", "Symptomps");
  schedule.innerHTML = "8-25-2022";
  schedule.setAttribute("data-label", "Schedule");
  address.innerHTML = "Caloocan City";
  address.setAttribute("data-label", "Address");
  contactNum.innerHTML = "133654987213";
  contactNum.setAttribute("data-label", "Contact No.");
  //
  complete.innerHTML = "";
  complete.appendChild(tr);
  tr.appendChild(name);
  tr.appendChild(age);
  tr.appendChild(symptomps);
  tr.appendChild(schedule);
  tr.appendChild(address);
  tr.appendChild(contactNum);
}
function cancelled() {
  let title = document.getElementById("tableTitle");
  title.innerHTML = "Cancelled";
  let cancelled = document.getElementById("appointmentTable");

  let tr = document.createElement("tr");
  let name = document.createElement("td");
  let age = document.createElement("td");
  let symptomps = document.createElement("td");
  let schedule = document.createElement("td");
  let address = document.createElement("td");
  let contactNum = document.createElement("td");

  name.innerHTML = "Robin test 1";
  name.setAttribute("data-label", "Patient Name");
  age.innerHTML = "29";
  age.setAttribute("data-label", "Age");
  symptomps.innerHTML = "Migraine";
  symptomps.setAttribute("data-label", "Symptomps");
  schedule.innerHTML = "8-25-2022";
  schedule.setAttribute("data-label", "Schedule");
  address.innerHTML = "Caloocan City";
  address.setAttribute("data-label", "Address");
  contactNum.innerHTML = "133654987213";
  contactNum.setAttribute("data-label", "Contact No.");
  cancelled.innerHTML = "";
  cancelled.appendChild(tr);
  tr.appendChild(name);
  tr.appendChild(age);
  tr.appendChild(symptomps);
  tr.appendChild(schedule);
  tr.appendChild(address);
  tr.appendChild(contactNum);
}
