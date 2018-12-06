function Segment(x, y, w, parent) {
    if (parent) {
        this.a = parent.b.copy();
        this.parent = parent;
    } else {
        this.a = createVector(x, y);
        this.parent = undefined;
    }
    this.b = this.a.copy();
    this.angle;
    this.len = 5;
    this.w = w;
    this.vel = createVector(0, 0);
}