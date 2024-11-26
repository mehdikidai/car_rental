import "./bootstrap";

import AirDatepicker from "air-datepicker";
import "air-datepicker/air-datepicker.css";
import localeEn from "air-datepicker/locale/fr";
import "@splidejs/splide/css";
import Splide from "@splidejs/splide";
import { AutoScroll } from "@splidejs/splide-extension-auto-scroll";
//import { areDatesOutsideRange } from "./helper";
import axios from "axios";
import moment from "moment";
import SplitType from "split-type";
import { gsap } from "gsap";
import ScrollTrigger from "gsap/ScrollTrigger";

async function getBookedDays() {
    const Id = document.getElementById("input_car_id").value;

    const res = await axios.get(`/get-booked-days/${Id}`);

    if (res.status === 200) {
        return await res.data.booked_days;
    }

    return [];
}

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
        } else {
            totalDays.innerText = "-";

            rentalTotal.innerText = "-";
        }
    }

    getBookedDays().then((bookedDays) => {
        const newBookedDays = bookedDays.map((el) =>
            moment(el).format("MM-DD-YYYY")
        );

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
            onRenderCell({ date }) {
                if (newBookedDays.includes(moment(date).format("MM-DD-YYYY"))) {
                    return {
                        disabled: true,
                    };
                }
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
            onRenderCell({ date }) {
                if (newBookedDays.includes(moment(date).format("MM-DD-YYYY"))) {
                    return {
                        disabled: true,
                    };
                }
            },
        });
    });
}

const formDeleteRental = document.querySelectorAll(".form_delete_rental");

if (formDeleteRental) {
    formDeleteRental.forEach((f) => {
        f.addEventListener("submit", (e) => {
            e.preventDefault();
            Swal.fire({
                title: "Are you sure?",
                iconHtml:
                    '<i class="material-symbols-outlined warning">error</i>',
                customClass: {
                    icon_alert: "no-border",
                },
                showCancelButton: true,
                confirmButtonColor: "#e63946",
                cancelButtonColor: "#457b9d",
                confirmButtonText: "Yes !",
                position: "top",
            }).then(({ isConfirmed }) => {
                if (isConfirmed) {
                    f.submit();
                }
            });
        });
    });
}

const langBtn = document.getElementById("lang_btn");
const links = document.getElementById("links");

langBtn?.addEventListener("click", function () {
    console.log(this);
    this.classList.toggle("active");
});

const menuBtn = document.getElementById("menu_btn");

menuBtn?.addEventListener("click", function () {
    menuBtn.setPointerCapture(event.pointerId);
    links.classList.toggle("active");

    console.log("hi");
});

const textCover = document.getElementById("text_cover");

if (textCover) {
    const text = new SplitType("#text_cover");

    var tl = gsap.timeline({ repeatDelay: 1 });

    tl.from(".char", {
        y: 50,
        stagger: 0.05,
        opacity: 0,
        ease: "power4.out",
        direction: 0.5,
    });

    tl.from(".booking-section", {
        y: 50,
        opacity: 0,
        ease: "power1.out",
        direction: 0.2,
    });

    gsap.from(".splide__slide", {
        y: 50,
        opacity: 0,
        ease: "expo.out",
        direction: 0,
        stagger: 0.15,
        filter: "blur(4px)",
    });

}


const boxsCars = document.querySelector(".boxs");

if (boxsCars) {
    gsap.registerPlugin(ScrollTrigger);

    // الحصول على جميع العناصر
    const cars = gsap.utils.toArray(".div-img > img");

    if (cars.length) {
        gsap.from(cars, {
            scrollTrigger: {
                trigger: cars[0], 
                scrub: true, 
                //markers: true, 
            },
            x: 400,
            stagger: 0.1,
            ease: "power2.out"
        });
    }
}