import "./bootstrap";

import AirDatepicker from "air-datepicker";
import "air-datepicker/air-datepicker.css";
import localeEn from "air-datepicker/locale/fr";
import "@splidejs/splide/css";
import Splide from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";
import { areDatesOutsideRange } from "./helper";

//import TomSelect from "tom-select";

let today = new Date();
let tomorrow = new Date();
tomorrow.setDate(today.getDate() + 1);

let dpMin, dpMax;

dpMin = new AirDatepicker("#date_star", {
    locale: localeEn,
    autoClose: true,
    isMobile: false,
    minDate: tomorrow,
    dateFormat: "yyyy-MM-dd",
    //visible: true,
    onSelect({ date }) {
        let newMaxDate = new Date(date);
        newMaxDate.setDate(newMaxDate.getDate() + 1);
        dpMax.update({
            minDate: newMaxDate,
        });
    },
});

dpMax = new AirDatepicker("#date_end", {
    locale: localeEn,
    autoClose: true,
    isMobile: false,
    minDate: tomorrow,
    dateFormat: "yyyy-MM-dd",
    onSelect({ date }) {
        dpMin.update({
            maxDate: date,
        });
    },
});

if (document.querySelector("#splide_home")) {
    new Splide("#splide_home", {
        classes: {
            arrows: "splide__arrows your-class-arrows aaa",
            arrow: "splide__arrow your-class-arrow aaa",
            prev: "splide__arrow--prev splide_hidden",
            next: "splide__arrow--next splide_hidden",
            pagination:
                "splide__pagination your-class-pagination splide_hidden",
            page: "splide__pagination__page your-class-page aa splide_hidden",
        },
        perPage: 6,
        fixedHeight: "100px",
        gap: 15,
        type: "loop",
        drag: "free",
        focus: "center",
        breakpoints: {
            800: { perPage: 4, fixedHeight: "70px" },
            640: { perPage: 3, fixedHeight: "70px" },
        },
        autoScroll: {
            speed: 2,
            pauseOnFocus: false,
            pauseOnHover: false,
        },
    }).mount({ AutoScroll });
}

if (document.getElementById("rental_date")) {
    let rentalDate = null;
    let returnDate = null;

    function x(rentalDate, returnDate) {
        let totalDays = document.getElementById("total_days");
        let rentalTotal = document.getElementById("rental_total");

        let price = totalDays.dataset.price;

        if (rentalDate && returnDate) {
            
            const rentalDateObj = new Date(rentalDate);
            const returnDateObj = new Date(returnDate);
            const timeDifference = returnDateObj - rentalDateObj;
            const dayDifference = timeDifference / (1000 * 3600 * 24);

            //console.log(rentalDate, returnDate);

            totalDays.innerText = dayDifference > 0 ? dayDifference : "-";

            rentalTotal.innerText =
                dayDifference > 0
                    ? `${(Number(price) * dayDifference).toFixed(2)} DH` 
                    : "-";

            //console.log(dayDifference, Number(price) * dayDifference);
            //return dayDifference;
        } else {
            totalDays.innerText = "-";

            rentalTotal.innerText = "-";
        }
    }

    let dpMin_2, dpMax_2;

    dpMin_2 = new AirDatepicker("#rental_date", {
        locale: localeEn,
        autoClose: true,
        isMobile: false,
        minDate: tomorrow,
        dateFormat: "yyyy-MM-dd",
        onSelect({ date }) {
            rentalDate = date;
            x(rentalDate, returnDate);
            let newMaxDate = new Date(date);
            newMaxDate.setDate(newMaxDate.getDate() + 1);
            dpMax_2.update({
                minDate: newMaxDate,
            });
        },
    });

    dpMax_2 = new AirDatepicker("#return_date", {
        locale: localeEn,
        autoClose: true,
        isMobile: false,
        minDate: tomorrow,
        dateFormat: "yyyy-MM-dd",
        onSelect({ date }) {
            returnDate = date;
            x(rentalDate, returnDate);
            dpMin_2.update({
                maxDate: date,
            });
        },
    });
}
