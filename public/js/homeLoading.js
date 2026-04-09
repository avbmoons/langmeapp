const viewportWidth = window.innerWidth + "px";
console.log("ViewportWidth = ", viewportWidth);

const root = document.documentElement;
root.style.setProperty("--viewport-width", viewportWidth);

const pageUrl = window.location.pathname;
let pageName = pageUrl.substring(pageUrl.lastIndexOf("/") + 1);
console.log(pageName);

//// Verify storage
verifyStorage();

function verifyTotals(totals) {
  if (!localStorage.getItem(totals)) {
    console.log(totals + " - none");
    localStorage.setItem(totals, "0,0");
  } else {
    console.log(totals + " - here");
  }
}

function verifyResource(resource) {
  if (!localStorage.getItem(resource)) {
    console.log(resource + " - none");
    localStorage.setItem(resource, "");
    resourceDefault(resource);
  } else {
    console.log(resource + " - here");
  }
}

function resourceDefault(resource) {
  switch (resource) {
    case "primLang":
      localStorage.setItem("primLang", "Russian - Русский язык");
      break;
    case "compLangs":
      localStorage.setItem("compLangs", "Armenian, Greek, Finnish, Latvian");
      break;
    case "themesLangs":
      localStorage.setItem(
        "themesLangs",
        "World sides, Seasons, Months, Weekdays"
      );
      break;
    case "modeChoice":
      localStorage.setItem("modeChoice", "Choice");
      break;
    default:
      alert("Please, choose your task settings!");
  }
}

function verifyStorage() {
  // verify totals: totalsChoice, totalsMix, totalsLang
  verifyTotals("totalsChoice");
  verifyTotals("totalsMix");
  verifyTotals("totalsLang");

  // verify resources: primLang, compLangs, themesLangs, modeChoice
  verifyResource("primLang");
  verifyResource("compLangs");
  verifyResource("themesLangs");
  verifyResource("modeChoice");
}

//localStorage.removeItem("");

//// Modal Results open-close

const resultsButton = document.getElementById("resultsButton");
const resultsModal = document.getElementById("resultsModal");
const redultsClose = document.getElementById("resultsClose");

resultsModal.style.display = "none";

const openModalResults = () => {
  resultsModal.style.display = "flex";
};

const closeModalResults = () => {
  resultsModal.style.display = "none";
};

//// Results totals

let enjoyChoice = document.getElementById("enjoyChoice");
let worryChoice = document.getElementById("worryChoice");

let enjoyMix = document.getElementById("enjoyMix");
let worryMix = document.getElementById("worryMix");

let enjoyLang = document.getElementById("enjoyLang");
let worryLang = document.getElementById("worryLang");

let enjoyGrand = document.getElementById("enjoyGrand");
let worryGrand = document.getElementById("worryGrand");

function grandTotals() {
  let totalsChoice = localStorage.getItem("totalsChoice");
  let strTotalsChoice;
  let numTotalsChoice;
  if (totalsChoice == null) {
    strTotalsChoice == "0, 0";
    numTotalsChoice == [0, 0]; //
  } else {
    strTotalsChoice = totalsChoice.split(",");
    numTotalsChoice = strTotalsChoice.map((item) => {
      return parseInt(item.trim());
    });
  }

  console.log("Totals Choice: ");
  console.log(numTotalsChoice);

  let totalsMix = localStorage.getItem("totalsMix");
  let strTotalsMix;
  let numTotalsMix;
  if (totalsMix == null) {
    strTotalsMix = "0, 0";
    numTotalsMix = [0, 0];
  } else {
    strTotalsMix = totalsMix.split(",");
    numTotalsMix = strTotalsMix.map((item) => {
      return parseInt(item.trim());
    });
  }

  console.log("Totals Mix: ");
  console.log(numTotalsMix);

  let totalsLang = localStorage.getItem("totalsLang");
  let strTotalsLang;
  let numTotalsLang;
  if (totalsLang == null) {
    strTotalsLang == "0, 0";
    numTotalsLang == [0, 0];
  } else {
    strTotalsLang = totalsLang.split(",");
    numTotalsLang = strTotalsLang.map((item) => {
      return parseInt(item.trim());
    });
  }

  console.log("Totals Lang: ");
  console.log(numTotalsLang);

  //// Results modal and report
  console.log("numTotalsChoice[0]" + numTotalsChoice[0].valueOf());

  //enjoyChoice. = numTotalsChoice[0];

  enjoyChoice.textContent = numTotalsChoice[0];
  worryChoice.textContent = numTotalsChoice[1];

  enjoyMix.textContent = numTotalsMix[0];
  worryMix.textContent = numTotalsMix[1];

  enjoyLang.textContent = numTotalsLang[0];
  worryLang.textContent = numTotalsLang[1];

  let grandTotalEnjoy = numTotalsChoice[0] + numTotalsMix[0] + numTotalsLang[0];
  let grandTotalWorry = numTotalsChoice[1] + numTotalsMix[1] + numTotalsLang[1];
  let grandTotal = grandTotalEnjoy + grandTotalWorry;

  if ((pageName = "home.html")) {
    let grandEnjoy = document.getElementById("grandEnjoy");
    let grandWorry = document.getElementById("grandWorry");

    if (grandTotal === 0 || grandTotal === null) {
      grandTotal = 1;
    }

    let valueGrandEnjoy = Math.round((grandTotalEnjoy * 100) / grandTotal);
    let valueGrandWorry = Math.round((grandTotalWorry * 100) / grandTotal);

    enjoyGrand.textContent = valueGrandEnjoy + "%";
    worryGrand.textContent = valueGrandWorry + "%";

    grandEnjoy.textContent = valueGrandEnjoy + "%";
    grandWorry.textContent = valueGrandWorry + "%";
  }
}

grandTotals();
