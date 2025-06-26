export function formatDate(dateStr: string): string {
    if (!dateStr) return "";
    const [year, month, day] = dateStr.split("-");
    if (!year || !month || !day) return dateStr;
    return `${day}/${month}/${year.slice(-2)}`;
}

export function formatDecimal(value: number | string) {
    return Number(value).toFixed(1);
}