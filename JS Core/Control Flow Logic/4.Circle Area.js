function circleArea(r) {
    let area = Math.PI * r * r;
    let areaRound = Math.round(area * 100) / 100;
    console.log(area);
    console.log(areaRound);
}