function colorful(num) {
    let str = '<ul>\n';
    let color = '';
    for (let i = 1; i <= num; i++) {
        if (i % 2 === 0) {
            color = "blue";
        } else {
            color = "green";
        }
        str += `<li><span style='color:${color}'>${i}</span></li>\n`;
    }
    str += '</ul>';
    console.log(str);
}