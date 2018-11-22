function rounding([num, precision]) {
    precision = Number(precision);
    if (precision > 15) {
        precision = 15;
    }
    num = Number(num).toFixed(precision);
    console.log(Number(num));
}