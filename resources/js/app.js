import "./bootstrap";

import AirDatepicker from "air-datepicker";
import "air-datepicker/air-datepicker.css";
import localeEn from "air-datepicker/locale/fr";
import "@splidejs/splide/css";
import Splide from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";
import { areDatesOutsideRange } from "./helper";

import TomSelect from "tom-select";

let today = new Date();
let tomorrow = new Date();
tomorrow.setDate(today.getDate() + 1);

const disabledDates = [
    new Date(2024, 5, 20),
    new Date(2024, 5, 21),
    new Date(2024, 5, 22),
];

new AirDatepicker("#my-element", {
    locale: localeEn,
    //autoClose: true,
    isMobile: false,
    minDate: tomorrow,
    range: true,
    onRenderCell({ date, cellType }) {
        if (cellType === "day") {
            if (disabledDates.some((d) => d.getTime() === date.getTime())) {
                return {
                    disabled: true,
                };
            }
        }
    },
    onSelect({ date: d }) {},
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


new AirDatepicker("#my-element-2", {
    locale: localeEn,
    autoClose: true,
    isMobile: false,
    minDate: tomorrow,
    range: true,
});


// new TomSelect("#select-beast", {
//     create: true,
//     sortField: {
//         field: "text",
//         direction: "asc",
//     },
// });