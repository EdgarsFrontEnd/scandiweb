const descriptionText = {
  none: "",
  dvd: "Please provide disk size in MB",
  book: "Please provide weight in KG",
  furniture: "Please provide dimensional values in CM",
};
const description = document.querySelector(".description");

function updateForm() {
  let type = document.getElementById("productType").value;
  description.innerText = descriptionText[type];
  const hiddenInputs = document.querySelectorAll(".hidden");
  [...hiddenInputs].forEach((el) => {
    el.style.display = "none";
  });

  document.getElementsByClassName(type)[0].parentElement.style.display =
    "block";
}
