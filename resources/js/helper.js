export function areDatesOutsideRange(startDate, endDate, dates) {
    const start = new Date(startDate);
    const end = new Date(endDate);

    for (const date of dates) {
        const current = new Date(date);
        if (current >= start && current <= end) {
            return false;
        }
    }

    return true;
}
