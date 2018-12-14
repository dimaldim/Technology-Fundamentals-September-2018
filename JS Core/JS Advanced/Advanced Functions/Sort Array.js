function sortArray(arr, method) {
    var asc = function (a, b) {
        return a - b;
    };
    var desc = function (a, b) {
        return b - a;
    };
    var methods = {
        'asc': asc,
        'desc': desc
    };
    return arr.sort(methods[method]);
}
