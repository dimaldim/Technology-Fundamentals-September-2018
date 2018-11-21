function sumVat(input) {
    let sum = 0;
    for (let num of input)
        sum += num;
    console.log("sum = " + sum);
    console.log("VAT = " + sum * 0.20);
    console.log("total = " + sum * 1.20);
}