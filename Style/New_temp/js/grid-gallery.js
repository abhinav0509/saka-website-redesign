/*!
 * imagesLoaded PACKAGED v3.1.4
 * JavaScript is all like "You images are done yet or what?"
 * MIT License
 */
(function () {
    function e() {}
    function t(e, t) {
        for (var n = e.length; n--;) if (e[n].listener === t) return n;
        return -1
    }
    function n(e) {
        return function () {
            return this[e].apply(this, arguments)
        }
    }
    var i = e.prototype,
        r = this,
        o = r.EventEmitter;
    i.getListeners = function (e) {
        var t, n, i = this._getEvents();
        if ("object" == typeof e) {
            t = {};
            for (n in i) i.hasOwnProperty(n) && e.test(n) && (t[n] = i[n])
        } else t = i[e] || (i[e] = []);
        return t
    }, i.flattenListeners = function (e) {
        var t, n = [];
        for (t = 0; e.length > t; t += 1) n.push(e[t].listener);
        return n
    }, i.getListenersAsObject = function (e) {
        var t, n = this.getListeners(e);
        return n instanceof Array && (t = {}, t[e] = n), t || n
    }, i.addListener = function (e, n) {
        var i, r = this.getListenersAsObject(e),
            o = "object" == typeof n;
        for (i in r) r.hasOwnProperty(i) && -1 === t(r[i], n) && r[i].push(o ? n : {
            listener: n,
            once: !1
        });
        return this
    }, i.on = n("addListener"), i.addOnceListener = function (e, t) {
        return this.addListener(e, {
            listener: t,
            once: !0
        })
    }, i.once = n("addOnceListener"), i.defineEvent = function (e) {
        return this.getListeners(e), this
    }, i.defineEvents = function (e) {
        for (var t = 0; e.length > t; t += 1) this.defineEvent(e[t]);
        return this
    }, i.removeListener = function (e, n) {
        var i, r, o = this.getListenersAsObject(e);
        for (r in o) o.hasOwnProperty(r) && (i = t(o[r], n), -1 !== i && o[r].splice(i, 1));
        return this
    }, i.off = n("removeListener"), i.addListeners = function (e, t) {
        return this.manipulateListeners(!1, e, t)
    }, i.removeListeners = function (e, t) {
        return this.manipulateListeners(!0, e, t)
    }, i.manipulateListeners = function (e, t, n) {
        var i, r, o = e ? this.removeListener : this.addListener,
            s = e ? this.removeListeners : this.addListeners;
        if ("object" != typeof t || t instanceof RegExp) for (i = n.length; i--;) o.call(this, t, n[i]);
        else for (i in t) t.hasOwnProperty(i) && (r = t[i]) && ("function" == typeof r ? o.call(this, i, r) : s.call(this, i, r));
        return this
    }, i.removeEvent = function (e) {
        var t, n = typeof e,
            i = this._getEvents();
        if ("string" === n) delete i[e];
        else if ("object" === n) for (t in i) i.hasOwnProperty(t) && e.test(t) && delete i[t];
        else delete this._events;
        return this
    }, i.removeAllListeners = n("removeEvent"), i.emitEvent = function (e, t) {
        var n, i, r, o, s = this.getListenersAsObject(e);
        for (r in s) if (s.hasOwnProperty(r)) for (i = s[r].length; i--;) n = s[r][i], n.once === !0 && this.removeListener(e, n.listener), o = n.listener.apply(this, t || []), o === this._getOnceReturnValue() && this.removeListener(e, n.listener);
        return this
    }, i.trigger = n("emitEvent"), i.emit = function (e) {
        var t = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(e, t)
    }, i.setOnceReturnValue = function (e) {
        return this._onceReturnValue = e, this
    }, i._getOnceReturnValue = function () {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, i._getEvents = function () {
        return this._events || (this._events = {})
    }, e.noConflict = function () {
        return r.EventEmitter = o, e
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () {
        return e
    }) : "object" == typeof module && module.exports ? module.exports = e : this.EventEmitter = e
}).call(this), function (e) {
    function t(t) {
        var n = e.event;
        return n.target = n.target || n.srcElement || t, n
    }
    var n = document.documentElement,
        i = function () {};
    n.addEventListener ? i = function (e, t, n) {
        e.addEventListener(t, n, !1)
    } : n.attachEvent && (i = function (e, n, i) {
        e[n + i] = i.handleEvent ?
        function () {
            var n = t(e);
            i.handleEvent.call(i, n)
        } : function () {
            var n = t(e);
            i.call(e, n)
        }, e.attachEvent("on" + n, e[n + i])
    });
    var r = function () {};
    n.removeEventListener ? r = function (e, t, n) {
        e.removeEventListener(t, n, !1)
    } : n.detachEvent && (r = function (e, t, n) {
        e.detachEvent("on" + t, e[t + n]);
        try {
            delete e[t + n]
        } catch (i) {
            e[t + n] = void 0
        }
    });
    var o = {
        bind: i,
        unbind: r
    };
    "function" == typeof define && define.amd ? define("eventie/eventie", o) : e.eventie = o
}(this), function (e, t) {
    "function" == typeof define && define.amd ? define(["eventEmitter/EventEmitter", "eventie/eventie"], function (n, i) {
        return t(e, n, i)
    }) : "object" == typeof exports ? module.exports = t(e, require("eventEmitter"), require("eventie")) : e.imagesLoaded = t(e, e.EventEmitter, e.eventie)
}(this, function (e, t, n) {
    function i(e, t) {
        for (var n in t) e[n] = t[n];
        return e
    }
    function r(e) {
        return "[object Array]" === d.call(e)
    }
    function o(e) {
        var t = [];
        if (r(e)) t = e;
        else if ("number" == typeof e.length) for (var n = 0, i = e.length; i > n; n++) t.push(e[n]);
        else t.push(e);
        return t
    }
    function s(e, t, n) {
        if (!(this instanceof s)) return new s(e, t);
        "string" == typeof e && (e = document.querySelectorAll(e)), this.elements = o(e), this.options = i({}, this.options), "function" == typeof t ? n = t : i(this.options, t), n && this.on("always", n), this.getImages(), a && (this.jqDeferred = new a.Deferred);
        var r = this;
        setTimeout(function () {
            r.check()
        })
    }
    function c(e) {
        this.img = e
    }
    function f(e) {
        this.src = e, v[e] = this
    }
    var a = e.jQuery,
        u = e.console,
        h = u !== void 0,
        d = Object.prototype.toString;
    s.prototype = new t, s.prototype.options = {}, s.prototype.getImages = function () {
        this.images = [];
        for (var e = 0, t = this.elements.length; t > e; e++) {
            var n = this.elements[e];
            "IMG" === n.nodeName && this.addImage(n);
            for (var i = n.querySelectorAll("img"), r = 0, o = i.length; o > r; r++) {
                var s = i[r];
                this.addImage(s)
            }
        }
    }, s.prototype.addImage = function (e) {
        var t = new c(e);
        this.images.push(t)
    }, s.prototype.check = function () {
        function e(e, r) {
            return t.options.debug && h && u.log("confirm", e, r), t.progress(e), n++, n === i && t.complete(), !0
        }
        var t = this,
            n = 0,
            i = this.images.length;
        if (this.hasAnyBroken = !1, !i) return this.complete(), void 0;
        for (var r = 0; i > r; r++) {
            var o = this.images[r];
            o.on("confirm", e), o.check()
        }
    }, s.prototype.progress = function (e) {
        this.hasAnyBroken = this.hasAnyBroken || !e.isLoaded;
        var t = this;
        setTimeout(function () {
            t.emit("progress", t, e), t.jqDeferred && t.jqDeferred.notify && t.jqDeferred.notify(t, e)
        })
    }, s.prototype.complete = function () {
        var e = this.hasAnyBroken ? "fail" : "done";
        this.isComplete = !0;
        var t = this;
        setTimeout(function () {
            if (t.emit(e, t), t.emit("always", t), t.jqDeferred) {
                var n = t.hasAnyBroken ? "reject" : "resolve";
                t.jqDeferred[n](t)
            }
        })
    }, a && (a.fn.imagesLoaded = function (e, t) {
        var n = new s(this, e, t);
        return n.jqDeferred.promise(a(this))
    }), c.prototype = new t, c.prototype.check = function () {
        var e = v[this.img.src] || new f(this.img.src);
        if (e.isConfirmed) return this.confirm(e.isLoaded, "cached was confirmed"), void 0;
        if (this.img.complete && void 0 !== this.img.naturalWidth) return this.confirm(0 !== this.img.naturalWidth, "naturalWidth"), void 0;
        var t = this;
        e.on("confirm", function (e, n) {
            return t.confirm(e.isLoaded, n), !0
        }), e.check()
    }, c.prototype.confirm = function (e, t) {
        this.isLoaded = e, this.emit("confirm", this, t)
    };
    var v = {};
    return f.prototype = new t, f.prototype.check = function () {
        if (!this.isChecked) {
            var e = new Image;
            n.bind(e, "load", this), n.bind(e, "error", this), e.src = this.src, this.isChecked = !0
        }
    }, f.prototype.handleEvent = function (e) {
        var t = "on" + e.type;
        this[t] && this[t](e)
    }, f.prototype.onload = function (e) {
        this.confirm(!0, "onload"), this.unbindProxyEvents(e)
    }, f.prototype.onerror = function (e) {
        this.confirm(!1, "onerror"), this.unbindProxyEvents(e)
    }, f.prototype.confirm = function (e, t) {
        this.isConfirmed = !0, this.isLoaded = e, this.emit("confirm", this, t)
    }, f.prototype.unbindProxyEvents = function (e) {
        n.unbind(e.target, "load", this), n.unbind(e.target, "error", this)
    }, s
});







/*!
 * Masonry PACKAGED v3.1.4
 * Cascading grid layout library
 * http://masonry.desandro.com
 * MIT License
 * by David DeSandro
 */

(function (t) {
    function e() {}
    function i(t) {
        function i(e) {
            e.prototype.option || (e.prototype.option = function (e) {
                t.isPlainObject(e) && (this.options = t.extend(!0, this.options, e))
            })
        }
        function o(e, i) {
            t.fn[e] = function (o) {
                if ("string" == typeof o) {
                    for (var s = n.call(arguments, 1), a = 0, h = this.length; h > a; a++) {
                        var p = this[a],
                            u = t.data(p, e);
                        if (u) if (t.isFunction(u[o]) && "_" !== o.charAt(0)) {
                            var f = u[o].apply(u, s);
                            if (void 0 !== f) return f
                        } else r("no such method '" + o + "' for " + e + " instance");
                        else r("cannot call methods on " + e + " prior to initialization; " + "attempted to call '" + o + "'")
                    }
                    return this
                }
                return this.each(function () {
                    var n = t.data(this, e);
                    n ? (n.option(o), n._init()) : (n = new i(this, o), t.data(this, e, n))
                })
            }
        }
        if (t) {
            var r = "undefined" == typeof console ? e : function (t) {
                    console.error(t)
                };
            return t.bridget = function (t, e) {
                i(e), o(t, e)
            }, t.bridget
        }
    }
    var n = Array.prototype.slice;
    "function" == typeof define && define.amd ? define("jquery-bridget/jquery.bridget", ["jquery"], i) : i(t.jQuery)
})(window), function (t) {
    function e(e) {
        var i = t.event;
        return i.target = i.target || i.srcElement || e, i
    }
    var i = document.documentElement,
        n = function () {};
    i.addEventListener ? n = function (t, e, i) {
        t.addEventListener(e, i, !1)
    } : i.attachEvent && (n = function (t, i, n) {
        t[i + n] = n.handleEvent ?
        function () {
            var i = e(t);
            n.handleEvent.call(n, i)
        } : function () {
            var i = e(t);
            n.call(t, i)
        }, t.attachEvent("on" + i, t[i + n])
    });
    var o = function () {};
    i.removeEventListener ? o = function (t, e, i) {
        t.removeEventListener(e, i, !1)
    } : i.detachEvent && (o = function (t, e, i) {
        t.detachEvent("on" + e, t[e + i]);
        try {
            delete t[e + i]
        } catch (n) {
            t[e + i] = void 0
        }
    });
    var r = {
        bind: n,
        unbind: o
    };
    "function" == typeof define && define.amd ? define("eventie/eventie", r) : "object" == typeof exports ? module.exports = r : t.eventie = r
}(this), function (t) {
    function e(t) {
        "function" == typeof t && (e.isReady ? t() : r.push(t))
    }
    function i(t) {
        var i = "readystatechange" === t.type && "complete" !== o.readyState;
        if (!e.isReady && !i) {
            e.isReady = !0;
            for (var n = 0, s = r.length; s > n; n++) {
                var a = r[n];
                a()
            }
        }
    }
    function n(n) {
        return n.bind(o, "DOMContentLoaded", i), n.bind(o, "readystatechange", i), n.bind(t, "load", i), e
    }
    var o = t.document,
        r = [];
    e.isReady = !1, "function" == typeof define && define.amd ? (e.isReady = "function" == typeof requirejs, define("doc-ready/doc-ready", ["eventie/eventie"], n)) : t.docReady = n(t.eventie)
}(this), function () {
    function t() {}
    function e(t, e) {
        for (var i = t.length; i--;) if (t[i].listener === e) return i;
        return -1
    }
    function i(t) {
        return function () {
            return this[t].apply(this, arguments)
        }
    }
    var n = t.prototype,
        o = this,
        r = o.EventEmitter;
    n.getListeners = function (t) {
        var e, i, n = this._getEvents();
        if (t instanceof RegExp) {
            e = {};
            for (i in n) n.hasOwnProperty(i) && t.test(i) && (e[i] = n[i])
        } else e = n[t] || (n[t] = []);
        return e
    }, n.flattenListeners = function (t) {
        var e, i = [];
        for (e = 0; t.length > e; e += 1) i.push(t[e].listener);
        return i
    }, n.getListenersAsObject = function (t) {
        var e, i = this.getListeners(t);
        return i instanceof Array && (e = {}, e[t] = i), e || i
    }, n.addListener = function (t, i) {
        var n, o = this.getListenersAsObject(t),
            r = "object" == typeof i;
        for (n in o) o.hasOwnProperty(n) && -1 === e(o[n], i) && o[n].push(r ? i : {
            listener: i,
            once: !1
        });
        return this
    }, n.on = i("addListener"), n.addOnceListener = function (t, e) {
        return this.addListener(t, {
            listener: e,
            once: !0
        })
    }, n.once = i("addOnceListener"), n.defineEvent = function (t) {
        return this.getListeners(t), this
    }, n.defineEvents = function (t) {
        for (var e = 0; t.length > e; e += 1) this.defineEvent(t[e]);
        return this
    }, n.removeListener = function (t, i) {
        var n, o, r = this.getListenersAsObject(t);
        for (o in r) r.hasOwnProperty(o) && (n = e(r[o], i), -1 !== n && r[o].splice(n, 1));
        return this
    }, n.off = i("removeListener"), n.addListeners = function (t, e) {
        return this.manipulateListeners(!1, t, e)
    }, n.removeListeners = function (t, e) {
        return this.manipulateListeners(!0, t, e)
    }, n.manipulateListeners = function (t, e, i) {
        var n, o, r = t ? this.removeListener : this.addListener,
            s = t ? this.removeListeners : this.addListeners;
        if ("object" != typeof e || e instanceof RegExp) for (n = i.length; n--;) r.call(this, e, i[n]);
        else for (n in e) e.hasOwnProperty(n) && (o = e[n]) && ("function" == typeof o ? r.call(this, n, o) : s.call(this, n, o));
        return this
    }, n.removeEvent = function (t) {
        var e, i = typeof t,
            n = this._getEvents();
        if ("string" === i) delete n[t];
        else if (t instanceof RegExp) for (e in n) n.hasOwnProperty(e) && t.test(e) && delete n[e];
        else delete this._events;
        return this
    }, n.removeAllListeners = i("removeEvent"), n.emitEvent = function (t, e) {
        var i, n, o, r, s = this.getListenersAsObject(t);
        for (o in s) if (s.hasOwnProperty(o)) for (n = s[o].length; n--;) i = s[o][n], i.once === !0 && this.removeListener(t, i.listener), r = i.listener.apply(this, e || []), r === this._getOnceReturnValue() && this.removeListener(t, i.listener);
        return this
    }, n.trigger = i("emitEvent"), n.emit = function (t) {
        var e = Array.prototype.slice.call(arguments, 1);
        return this.emitEvent(t, e)
    }, n.setOnceReturnValue = function (t) {
        return this._onceReturnValue = t, this
    }, n._getOnceReturnValue = function () {
        return this.hasOwnProperty("_onceReturnValue") ? this._onceReturnValue : !0
    }, n._getEvents = function () {
        return this._events || (this._events = {})
    }, t.noConflict = function () {
        return o.EventEmitter = r, t
    }, "function" == typeof define && define.amd ? define("eventEmitter/EventEmitter", [], function () {
        return t
    }) : "object" == typeof module && module.exports ? module.exports = t : this.EventEmitter = t
}.call(this), function (t) {
    function e(t) {
        if (t) {
            if ("string" == typeof n[t]) return t;
            t = t.charAt(0).toUpperCase() + t.slice(1);
            for (var e, o = 0, r = i.length; r > o; o++) if (e = i[o] + t, "string" == typeof n[e]) return e
        }
    }
    var i = "Webkit Moz ms Ms O".split(" "),
        n = document.documentElement.style;
    "function" == typeof define && define.amd ? define("get-style-property/get-style-property", [], function () {
        return e
    }) : "object" == typeof exports ? module.exports = e : t.getStyleProperty = e
}(window), function (t) {
    function e(t) {
        var e = parseFloat(t),
            i = -1 === t.indexOf("%") && !isNaN(e);
        return i && e
    }
    function i() {
        for (var t = {
            width: 0,
            height: 0,
            innerWidth: 0,
            innerHeight: 0,
            outerWidth: 0,
            outerHeight: 0
        }, e = 0, i = s.length; i > e; e++) {
            var n = s[e];
            t[n] = 0
        }
        return t
    }
    function n(t) {
        function n(t) {
            if ("string" == typeof t && (t = document.querySelector(t)), t && "object" == typeof t && t.nodeType) {
                var n = r(t);
                if ("none" === n.display) return i();
                var o = {};
                o.width = t.offsetWidth, o.height = t.offsetHeight;
                for (var u = o.isBorderBox = !(!p || !n[p] || "border-box" !== n[p]), f = 0, c = s.length; c > f; f++) {
                    var d = s[f],
                        l = n[d];
                    l = a(t, l);
                    var m = parseFloat(l);
                    o[d] = isNaN(m) ? 0 : m
                }
                var y = o.paddingLeft + o.paddingRight,
                    g = o.paddingTop + o.paddingBottom,
                    v = o.marginLeft + o.marginRight,
                    b = o.marginTop + o.marginBottom,
                    _ = o.borderLeftWidth + o.borderRightWidth,
                    E = o.borderTopWidth + o.borderBottomWidth,
                    L = u && h,
                    x = e(n.width);
                x !== !1 && (o.width = x + (L ? 0 : y + _));
                var z = e(n.height);
                return z !== !1 && (o.height = z + (L ? 0 : g + E)), o.innerWidth = o.width - (y + _), o.innerHeight = o.height - (g + E), o.outerWidth = o.width + v, o.outerHeight = o.height + b, o
            }
        }
        function a(t, e) {
            if (o || -1 === e.indexOf("%")) return e;
            var i = t.style,
                n = i.left,
                r = t.runtimeStyle,
                s = r && r.left;
            return s && (r.left = t.currentStyle.left), i.left = e, e = i.pixelLeft, i.left = n, s && (r.left = s), e
        }
        var h, p = t("boxSizing");
        return function () {
            if (p) {
                var t = document.createElement("div");
                t.style.width = "200px", t.style.padding = "1px 2px 3px 4px", t.style.borderStyle = "solid", t.style.borderWidth = "1px 2px 3px 4px", t.style[p] = "border-box";
                var i = document.body || document.documentElement;
                i.appendChild(t);
                var n = r(t);
                h = 200 === e(n.width), i.removeChild(t)
            }
        }(), n
    }
    var o = t.getComputedStyle,
        r = o ?
    function (t) {
        return o(t, null)
    } : function (t) {
        return t.currentStyle
    }, s = ["paddingLeft", "paddingRight", "paddingTop", "paddingBottom", "marginLeft", "marginRight", "marginTop", "marginBottom", "borderLeftWidth", "borderRightWidth", "borderTopWidth", "borderBottomWidth"];
    "function" == typeof define && define.amd ? define("get-size/get-size", ["get-style-property/get-style-property"], n) : "object" == typeof exports ? module.exports = n(require("get-style-property")) : t.getSize = n(t.getStyleProperty)
}(window), function (t, e) {
    function i(t, e) {
        return t[a](e)
    }
    function n(t) {
        if (!t.parentNode) {
            var e = document.createDocumentFragment();
            e.appendChild(t)
        }
    }
    function o(t, e) {
        n(t);
        for (var i = t.parentNode.querySelectorAll(e), o = 0, r = i.length; r > o; o++) if (i[o] === t) return !0;
        return !1
    }
    function r(t, e) {
        return n(t), i(t, e)
    }
    var s, a = function () {
            if (e.matchesSelector) return "matchesSelector";
            for (var t = ["webkit", "moz", "ms", "o"], i = 0, n = t.length; n > i; i++) {
                var o = t[i],
                    r = o + "MatchesSelector";
                if (e[r]) return r
            }
        }();
    if (a) {
        var h = document.createElement("div"),
            p = i(h, "div");
        s = p ? i : r
    } else s = o;
    "function" == typeof define && define.amd ? define("matches-selector/matches-selector", [], function () {
        return s
    }) : window.matchesSelector = s
}(this, Element.prototype), function (t) {
    function e(t, e) {
        for (var i in e) t[i] = e[i];
        return t
    }
    function i(t) {
        for (var e in t) return !1;
        return e = null, !0
    }
    function n(t) {
        return t.replace(/([A-Z])/g, function (t) {
            return "-" + t.toLowerCase()
        })
    }
    function o(t, o, r) {
        function a(t, e) {
            t && (this.element = t, this.layout = e, this.position = {
                x: 0,
                y: 0
            }, this._create())
        }
        var h = r("transition"),
            p = r("transform"),
            u = h && p,
            f = !! r("perspective"),
            c = {
                WebkitTransition: "webkitTransitionEnd",
                MozTransition: "transitionend",
                OTransition: "otransitionend",
                transition: "transitionend"
            }[h],
            d = ["transform", "transition", "transitionDuration", "transitionProperty"],
            l = function () {
                for (var t = {}, e = 0, i = d.length; i > e; e++) {
                    var n = d[e],
                        o = r(n);
                    o && o !== n && (t[n] = o)
                }
                return t
            }();
        e(a.prototype, t.prototype), a.prototype._create = function () {
            this._transn = {
                ingProperties: {},
                clean: {},
                onEnd: {}
            }, this.css({
                position: "absolute"
            })
        }, a.prototype.handleEvent = function (t) {
            var e = "on" + t.type;
            this[e] && this[e](t)
        }, a.prototype.getSize = function () {
            this.size = o(this.element)
        }, a.prototype.css = function (t) {
            var e = this.element.style;
            for (var i in t) {
                var n = l[i] || i;
                e[n] = t[i]
            }
        }, a.prototype.getPosition = function () {
            var t = s(this.element),
                e = this.layout.options,
                i = e.isOriginLeft,
                n = e.isOriginTop,
                o = parseInt(t[i ? "left" : "right"], 10),
                r = parseInt(t[n ? "top" : "bottom"], 10);
            o = isNaN(o) ? 0 : o, r = isNaN(r) ? 0 : r;
            var a = this.layout.size;
            o -= i ? a.paddingLeft : a.paddingRight, r -= n ? a.paddingTop : a.paddingBottom, this.position.x = o, this.position.y = r
        }, a.prototype.layoutPosition = function () {
            var t = this.layout.size,
                e = this.layout.options,
                i = {};
            e.isOriginLeft ? (i.left = this.position.x + t.paddingLeft + "px", i.right = "") : (i.right = this.position.x + t.paddingRight + "px", i.left = ""), e.isOriginTop ? (i.top = this.position.y + t.paddingTop + "px", i.bottom = "") : (i.bottom = this.position.y + t.paddingBottom + "px", i.top = ""), this.css(i), this.emitEvent("layout", [this])
        };
        var m = f ?
        function (t, e) {
            return "translate3d(" + t + "px, " + e + "px, 0)"
        } : function (t, e) {
            return "translate(" + t + "px, " + e + "px)"
        };
        a.prototype._transitionTo = function (t, e) {
            this.getPosition();
            var i = this.position.x,
                n = this.position.y,
                o = parseInt(t, 10),
                r = parseInt(e, 10),
                s = o === this.position.x && r === this.position.y;
            if (this.setPosition(t, e), s && !this.isTransitioning) return this.layoutPosition(), void 0;
            var a = t - i,
                h = e - n,
                p = {},
                u = this.layout.options;
            a = u.isOriginLeft ? a : -a, h = u.isOriginTop ? h : -h, p.transform = m(a, h), this.transition({
                to: p,
                onTransitionEnd: {
                    transform: this.layoutPosition
                },
                isCleaning: !0
            })
        }, a.prototype.goTo = function (t, e) {
            this.setPosition(t, e), this.layoutPosition()
        }, a.prototype.moveTo = u ? a.prototype._transitionTo : a.prototype.goTo, a.prototype.setPosition = function (t, e) {
            this.position.x = parseInt(t, 10), this.position.y = parseInt(e, 10)
        }, a.prototype._nonTransition = function (t) {
            this.css(t.to), t.isCleaning && this._removeStyles(t.to);
            for (var e in t.onTransitionEnd) t.onTransitionEnd[e].call(this)
        }, a.prototype._transition = function (t) {
            if (!parseFloat(this.layout.options.transitionDuration)) return this._nonTransition(t), void 0;
            var e = this._transn;
            for (var i in t.onTransitionEnd) e.onEnd[i] = t.onTransitionEnd[i];
            for (i in t.to) e.ingProperties[i] = !0, t.isCleaning && (e.clean[i] = !0);
            if (t.from) {
                this.css(t.from);
                var n = this.element.offsetHeight;
                n = null
            }
            this.enableTransition(t.to), this.css(t.to), this.isTransitioning = !0
        };
        var y = p && n(p) + ",opacity";
        a.prototype.enableTransition = function () {
            this.isTransitioning || (this.css({
                transitionProperty: y,
                transitionDuration: this.layout.options.transitionDuration
            }), this.element.addEventListener(c, this, !1))
        }, a.prototype.transition = a.prototype[h ? "_transition" : "_nonTransition"], a.prototype.onwebkitTransitionEnd = function (t) {
            this.ontransitionend(t)
        }, a.prototype.onotransitionend = function (t) {
            this.ontransitionend(t)
        };
        var g = {
            "-webkit-transform": "transform",
            "-moz-transform": "transform",
            "-o-transform": "transform"
        };
        a.prototype.ontransitionend = function (t) {
            if (t.target === this.element) {
                var e = this._transn,
                    n = g[t.propertyName] || t.propertyName;
                if (delete e.ingProperties[n], i(e.ingProperties) && this.disableTransition(), n in e.clean && (this.element.style[t.propertyName] = "", delete e.clean[n]), n in e.onEnd) {
                    var o = e.onEnd[n];
                    o.call(this), delete e.onEnd[n]
                }
                this.emitEvent("transitionEnd", [this])
            }
        }, a.prototype.disableTransition = function () {
            this.removeTransitionStyles(), this.element.removeEventListener(c, this, !1), this.isTransitioning = !1
        }, a.prototype._removeStyles = function (t) {
            var e = {};
            for (var i in t) e[i] = "";
            this.css(e)
        };
        var v = {
            transitionProperty: "",
            transitionDuration: ""
        };
        return a.prototype.removeTransitionStyles = function () {
            this.css(v)
        }, a.prototype.removeElem = function () {
            this.element.parentNode.removeChild(this.element), this.emitEvent("remove", [this])
        }, a.prototype.remove = function () {
            if (!h || !parseFloat(this.layout.options.transitionDuration)) return this.removeElem(), void 0;
            var t = this;
            this.on("transitionEnd", function () {
                return t.removeElem(), !0
            }), this.hide()
        }, a.prototype.reveal = function () {
            delete this.isHidden, this.css({
                display: ""
            });
            var t = this.layout.options;
            this.transition({
                from: t.hiddenStyle,
                to: t.visibleStyle,
                isCleaning: !0
            })
        }, a.prototype.hide = function () {
            this.isHidden = !0, this.css({
                display: ""
            });
            var t = this.layout.options;
            this.transition({
                from: t.visibleStyle,
                to: t.hiddenStyle,
                isCleaning: !0,
                onTransitionEnd: {
                    opacity: function () {
                        this.isHidden && this.css({
                            display: "none"
                        })
                    }
                }
            })
        }, a.prototype.destroy = function () {
            this.css({
                position: "",
                left: "",
                right: "",
                top: "",
                bottom: "",
                transition: "",
                transform: ""
            })
        }, a
    }
    var r = document.defaultView,
        s = r && r.getComputedStyle ?
    function (t) {
        return r.getComputedStyle(t, null)
    } : function (t) {
        return t.currentStyle
    };
    "function" == typeof define && define.amd ? define("outlayer/item", ["eventEmitter/EventEmitter", "get-size/get-size", "get-style-property/get-style-property"], o) : (t.Outlayer = {}, t.Outlayer.Item = o(t.EventEmitter, t.getSize, t.getStyleProperty))
}(window), function (t) {
    function e(t, e) {
        for (var i in e) t[i] = e[i];
        return t
    }
    function i(t) {
        return "[object Array]" === f.call(t)
    }
    function n(t) {
        var e = [];
        if (i(t)) e = t;
        else if (t && "number" == typeof t.length) for (var n = 0, o = t.length; o > n; n++) e.push(t[n]);
        else e.push(t);
        return e
    }
    function o(t, e) {
        var i = d(e, t); - 1 !== i && e.splice(i, 1)
    }
    function r(t) {
        return t.replace(/(.)([A-Z])/g, function (t, e, i) {
            return e + "-" + i
        }).toLowerCase()
    }
    function s(i, s, f, d, l, m) {
        function y(t, i) {
            if ("string" == typeof t && (t = a.querySelector(t)), !t || !c(t)) return h && h.error("Bad " + this.constructor.namespace + " element: " + t), void 0;
            this.element = t, this.options = e({}, this.options), this.option(i);
            var n = ++v;
            this.element.outlayerGUID = n, b[n] = this, this._create(), this.options.isInitLayout && this.layout()
        }
        function g(t, i) {
            t.prototype[i] = e({}, y.prototype[i])
        }
        var v = 0,
            b = {};
        return y.namespace = "outlayer", y.Item = m, y.prototype.options = {
            containerStyle: {
                position: "relative"
            },
            isInitLayout: !0,
            isOriginLeft: !0,
            isOriginTop: !0,
            isResizeBound: !0,
            transitionDuration: "0.4s",
            hiddenStyle: {
                opacity: 0,
                transform: "scale(0.001)"
            },
            visibleStyle: {
                opacity: 1,
                transform: "scale(1)"
            }
        }, e(y.prototype, f.prototype), y.prototype.option = function (t) {
            e(this.options, t)
        }, y.prototype._create = function () {
            this.reloadItems(), this.stamps = [], this.stamp(this.options.stamp), e(this.element.style, this.options.containerStyle), this.options.isResizeBound && this.bindResize()
        }, y.prototype.reloadItems = function () {
            this.items = this._itemize(this.element.children)
        }, y.prototype._itemize = function (t) {
            for (var e = this._filterFindItemElements(t), i = this.constructor.Item, n = [], o = 0, r = e.length; r > o; o++) {
                var s = e[o],
                    a = new i(s, this);
                n.push(a)
            }
            return n
        }, y.prototype._filterFindItemElements = function (t) {
            t = n(t);
            for (var e = this.options.itemSelector, i = [], o = 0, r = t.length; r > o; o++) {
                var s = t[o];
                if (c(s)) if (e) {
                    l(s, e) && i.push(s);
                    for (var a = s.querySelectorAll(e), h = 0, p = a.length; p > h; h++) i.push(a[h])
                } else i.push(s)
            }
            return i
        }, y.prototype.getItemElements = function () {
            for (var t = [], e = 0, i = this.items.length; i > e; e++) t.push(this.items[e].element);
            return t
        }, y.prototype.layout = function () {
            this._resetLayout(), this._manageStamps();
            var t = void 0 !== this.options.isLayoutInstant ? this.options.isLayoutInstant : !this._isLayoutInited;
            this.layoutItems(this.items, t), this._isLayoutInited = !0
        }, y.prototype._init = y.prototype.layout, y.prototype._resetLayout = function () {
            this.getSize()
        }, y.prototype.getSize = function () {
            this.size = d(this.element)
        }, y.prototype._getMeasurement = function (t, e) {
            var i, n = this.options[t];
            n ? ("string" == typeof n ? i = this.element.querySelector(n) : c(n) && (i = n), this[t] = i ? d(i)[e] : n) : this[t] = 0
        }, y.prototype.layoutItems = function (t, e) {
            t = this._getItemsForLayout(t), this._layoutItems(t, e), this._postLayout()
        }, y.prototype._getItemsForLayout = function (t) {
            for (var e = [], i = 0, n = t.length; n > i; i++) {
                var o = t[i];
                o.isIgnored || e.push(o)
            }
            return e
        }, y.prototype._layoutItems = function (t, e) {
            function i() {
                n.emitEvent("layoutComplete", [n, t])
            }
            var n = this;
            if (!t || !t.length) return i(), void 0;
            this._itemsOn(t, "layout", i);
            for (var o = [], r = 0, s = t.length; s > r; r++) {
                var a = t[r],
                    h = this._getItemLayoutPosition(a);
                h.item = a, h.isInstant = e || a.isLayoutInstant, o.push(h)
            }
            this._processLayoutQueue(o)
        }, y.prototype._getItemLayoutPosition = function () {
            return {
                x: 0,
                y: 0
            }
        }, y.prototype._processLayoutQueue = function (t) {
            for (var e = 0, i = t.length; i > e; e++) {
                var n = t[e];
                this._positionItem(n.item, n.x, n.y, n.isInstant)
            }
        }, y.prototype._positionItem = function (t, e, i, n) {
            n ? t.goTo(e, i) : t.moveTo(e, i)
        }, y.prototype._postLayout = function () {
            var t = this._getContainerSize();
            t && (this._setContainerMeasure(t.width, !0), this._setContainerMeasure(t.height, !1))
        }, y.prototype._getContainerSize = u, y.prototype._setContainerMeasure = function (t, e) {
            if (void 0 !== t) {
                var i = this.size;
                i.isBorderBox && (t += e ? i.paddingLeft + i.paddingRight + i.borderLeftWidth + i.borderRightWidth : i.paddingBottom + i.paddingTop + i.borderTopWidth + i.borderBottomWidth), t = Math.max(t, 0), this.element.style[e ? "width" : "height"] = t + "px"
            }
        }, y.prototype._itemsOn = function (t, e, i) {
            function n() {
                return o++, o === r && i.call(s), !0
            }
            for (var o = 0, r = t.length, s = this, a = 0, h = t.length; h > a; a++) {
                var p = t[a];
                p.on(e, n)
            }
        }, y.prototype.ignore = function (t) {
            var e = this.getItem(t);
            e && (e.isIgnored = !0)
        }, y.prototype.unignore = function (t) {
            var e = this.getItem(t);
            e && delete e.isIgnored
        }, y.prototype.stamp = function (t) {
            if (t = this._find(t)) {
                this.stamps = this.stamps.concat(t);
                for (var e = 0, i = t.length; i > e; e++) {
                    var n = t[e];
                    this.ignore(n)
                }
            }
        }, y.prototype.unstamp = function (t) {
            if (t = this._find(t)) for (var e = 0, i = t.length; i > e; e++) {
                var n = t[e];
                o(n, this.stamps), this.unignore(n)
            }
        }, y.prototype._find = function (t) {
            return t ? ("string" == typeof t && (t = this.element.querySelectorAll(t)), t = n(t)) : void 0
        }, y.prototype._manageStamps = function () {
            if (this.stamps && this.stamps.length) {
                this._getBoundingRect();
                for (var t = 0, e = this.stamps.length; e > t; t++) {
                    var i = this.stamps[t];
                    this._manageStamp(i)
                }
            }
        }, y.prototype._getBoundingRect = function () {
            var t = this.element.getBoundingClientRect(),
                e = this.size;
            this._boundingRect = {
                left: t.left + e.paddingLeft + e.borderLeftWidth,
                top: t.top + e.paddingTop + e.borderTopWidth,
                right: t.right - (e.paddingRight + e.borderRightWidth),
                bottom: t.bottom - (e.paddingBottom + e.borderBottomWidth)
            }
        }, y.prototype._manageStamp = u, y.prototype._getElementOffset = function (t) {
            var e = t.getBoundingClientRect(),
                i = this._boundingRect,
                n = d(t),
                o = {
                    left: e.left - i.left - n.marginLeft,
                    top: e.top - i.top - n.marginTop,
                    right: i.right - e.right - n.marginRight,
                    bottom: i.bottom - e.bottom - n.marginBottom
                };
            return o
        }, y.prototype.handleEvent = function (t) {
            var e = "on" + t.type;
            this[e] && this[e](t)
        }, y.prototype.bindResize = function () {
            this.isResizeBound || (i.bind(t, "resize", this), this.isResizeBound = !0)
        }, y.prototype.unbindResize = function () {
            i.unbind(t, "resize", this), this.isResizeBound = !1
        }, y.prototype.onresize = function () {
            function t() {
                e.resize(), delete e.resizeTimeout
            }
            this.resizeTimeout && clearTimeout(this.resizeTimeout);
            var e = this;
            this.resizeTimeout = setTimeout(t, 100)
        }, y.prototype.resize = function () {
            var t = d(this.element),
                e = this.size && t;
            e && t.innerWidth === this.size.innerWidth || this.layout()
        }, y.prototype.addItems = function (t) {
            var e = this._itemize(t);
            return e.length && (this.items = this.items.concat(e)), e
        }, y.prototype.appended = function (t) {
            var e = this.addItems(t);
            e.length && (this.layoutItems(e, !0), this.reveal(e))
        }, y.prototype.prepended = function (t) {
            var e = this._itemize(t);
            if (e.length) {
                var i = this.items.slice(0);
                this.items = e.concat(i), this._resetLayout(), this._manageStamps(), this.layoutItems(e, !0), this.reveal(e), this.layoutItems(i)
            }
        }, y.prototype.reveal = function (t) {
            var e = t && t.length;
            if (e) for (var i = 0; e > i; i++) {
                var n = t[i];
                n.reveal()
            }
        }, y.prototype.hide = function (t) {
            var e = t && t.length;
            if (e) for (var i = 0; e > i; i++) {
                var n = t[i];
                n.hide()
            }
        }, y.prototype.getItem = function (t) {
            for (var e = 0, i = this.items.length; i > e; e++) {
                var n = this.items[e];
                if (n.element === t) return n
            }
        }, y.prototype.getItems = function (t) {
            if (t && t.length) {
                for (var e = [], i = 0, n = t.length; n > i; i++) {
                    var o = t[i],
                        r = this.getItem(o);
                    r && e.push(r)
                }
                return e
            }
        }, y.prototype.remove = function (t) {
            t = n(t);
            var e = this.getItems(t);
            if (e && e.length) {
                this._itemsOn(e, "remove", function () {
                    this.emitEvent("removeComplete", [this, e])
                });
                for (var i = 0, r = e.length; r > i; i++) {
                    var s = e[i];
                    s.remove(), o(s, this.items)
                }
            }
        }, y.prototype.destroy = function () {
            var t = this.element.style;
            t.height = "", t.position = "", t.width = "";
            for (var e = 0, i = this.items.length; i > e; e++) {
                var n = this.items[e];
                n.destroy()
            }
            this.unbindResize(), delete this.element.outlayerGUID, p && p.removeData(this.element, this.constructor.namespace)
        }, y.data = function (t) {
            var e = t && t.outlayerGUID;
            return e && b[e]
        }, y.create = function (t, i) {
            function n() {
                y.apply(this, arguments)
            }
            return Object.create ? n.prototype = Object.create(y.prototype) : e(n.prototype, y.prototype), n.prototype.constructor = n, g(n, "options"), e(n.prototype.options, i), n.namespace = t, n.data = y.data, n.Item = function () {
                m.apply(this, arguments)
            }, n.Item.prototype = new m, s(function () {
                for (var e = r(t), i = a.querySelectorAll(".js-" + e), o = "data-" + e + "-options", s = 0, u = i.length; u > s; s++) {
                    var f, c = i[s],
                        d = c.getAttribute(o);
                    try {
                        f = d && JSON.parse(d)
                    } catch (l) {
                        h && h.error("Error parsing " + o + " on " + c.nodeName.toLowerCase() + (c.id ? "#" + c.id : "") + ": " + l);
                        continue
                    }
                    var m = new n(c, f);
                    p && p.data(c, t, m)
                }
            }), p && p.bridget && p.bridget(t, n), n
        }, y.Item = m, y
    }
    var a = t.document,
        h = t.console,
        p = t.jQuery,
        u = function () {},
        f = Object.prototype.toString,
        c = "object" == typeof HTMLElement ?
    function (t) {
        return t instanceof HTMLElement
    } : function (t) {
        return t && "object" == typeof t && 1 === t.nodeType && "string" == typeof t.nodeName
    }, d = Array.prototype.indexOf ?
    function (t, e) {
        return t.indexOf(e)
    } : function (t, e) {
        for (var i = 0, n = t.length; n > i; i++) if (t[i] === e) return i;
        return -1
    };
    "function" == typeof define && define.amd ? define("outlayer/outlayer", ["eventie/eventie", "doc-ready/doc-ready", "eventEmitter/EventEmitter", "get-size/get-size", "matches-selector/matches-selector", "./item"], s) : t.Outlayer = s(t.eventie, t.docReady, t.EventEmitter, t.getSize, t.matchesSelector, t.Outlayer.Item)
}(window), function (t) {
    function e(t, e) {
        var n = t.create("masonry");
        return n.prototype._resetLayout = function () {
            this.getSize(), this._getMeasurement("columnWidth", "outerWidth"), this._getMeasurement("gutter", "outerWidth"), this.measureColumns();
            var t = this.cols;
            for (this.colYs = []; t--;) this.colYs.push(0);
            this.maxY = 0
        }, n.prototype.measureColumns = function () {
            if (this.getContainerWidth(), !this.columnWidth) {
                var t = this.items[0],
                    i = t && t.element;
                this.columnWidth = i && e(i).outerWidth || this.containerWidth
            }
            this.columnWidth += this.gutter, this.cols = Math.floor((this.containerWidth + this.gutter) / this.columnWidth), this.cols = Math.max(this.cols, 1)
        }, n.prototype.getContainerWidth = function () {
            var t = this.options.isFitWidth ? this.element.parentNode : this.element,
                i = e(t);
            this.containerWidth = i && i.innerWidth
        }, n.prototype._getItemLayoutPosition = function (t) {
            t.getSize();
            var e = t.size.outerWidth % this.columnWidth,
                n = e && 1 > e ? "round" : "ceil",
                o = Math[n](t.size.outerWidth / this.columnWidth);
            o = Math.min(o, this.cols);
            for (var r = this._getColGroup(o), s = Math.min.apply(Math, r), a = i(r, s), h = {
                x: this.columnWidth * a,
                y: s
            }, p = s + t.size.outerHeight, u = this.cols + 1 - r.length, f = 0; u > f; f++) this.colYs[a + f] = p;
            return h
        }, n.prototype._getColGroup = function (t) {
            if (2 > t) return this.colYs;
            for (var e = [], i = this.cols + 1 - t, n = 0; i > n; n++) {
                var o = this.colYs.slice(n, n + t);
                e[n] = Math.max.apply(Math, o)
            }
            return e
        }, n.prototype._manageStamp = function (t) {
            var i = e(t),
                n = this._getElementOffset(t),
                o = this.options.isOriginLeft ? n.left : n.right,
                r = o + i.outerWidth,
                s = Math.floor(o / this.columnWidth);
            s = Math.max(0, s);
            var a = Math.floor(r / this.columnWidth);
            a -= r % this.columnWidth ? 0 : 1, a = Math.min(this.cols - 1, a);
            for (var h = (this.options.isOriginTop ? n.top : n.bottom) + i.outerHeight, p = s; a >= p; p++) this.colYs[p] = Math.max(h, this.colYs[p])
        }, n.prototype._getContainerSize = function () {
            this.maxY = Math.max.apply(Math, this.colYs);
            var t = {
                height: this.maxY
            };
            return this.options.isFitWidth && (t.width = this._getContainerFitWidth()), t
        }, n.prototype._getContainerFitWidth = function () {
            for (var t = 0, e = this.cols; --e && 0 === this.colYs[e];) t++;
            return (this.cols - t) * this.columnWidth - this.gutter
        }, n.prototype.resize = function () {
            var t = this.containerWidth;
            this.getContainerWidth(), t !== this.containerWidth && this.layout()
        }, n
    }
    var i = Array.prototype.indexOf ?
    function (t, e) {
        return t.indexOf(e)
    } : function (t, e) {
        for (var i = 0, n = t.length; n > i; i++) {
            var o = t[i];
            if (o === e) return i
        }
        return -1
    };
    "function" == typeof define && define.amd ? define(["outlayer/outlayer", "get-size/get-size"], e) : t.Masonry = e(t.Outlayer, t.getSize)
}(window);






/**
 * cbpGridGallery.js v1.0.0
 * http://www.codrops.com
 *
 * Licensed under the MIT license.
 * http://www.opensource.org/licenses/mit-license.php
 * 
 * Copyright 2014, Codrops
 * http://www.codrops.com
 */
;
(function (window) {

    'use strict';

    var docElem = window.document.documentElement,
        transEndEventNames = {
            'WebkitTransition': 'webkitTransitionEnd',
            'MozTransition': 'transitionend',
            'OTransition': 'oTransitionEnd',
            'msTransition': 'MSTransitionEnd',
            'transition': 'transitionend'
        },
        transEndEventName = transEndEventNames[Modernizr.prefixed('transition')],
        support = {
            transitions: Modernizr.csstransitions,
            support3d: Modernizr.csstransforms3d
        };

    function setTransform(el, transformStr) {
        el.style.WebkitTransform = transformStr;
        el.style.msTransform = transformStr;
        el.style.transform = transformStr;
    }

    // from http://responsejs.com/labs/dimensions/


    function getViewportW() {
        var client = docElem['clientWidth'],
            inner = window['innerWidth'];

        if (client < inner) return inner;
        else return client;
    }

    function extend(a, b) {
        for (var key in b) {
            if (b.hasOwnProperty(key)) {
                a[key] = b[key];
            }
        }
        return a;
    }

    function CBPGridGallery(el, options) {
        this.el = el;
        this.options = extend({}, this.options);
        extend(this.options, options);
        this._init();
    }

    CBPGridGallery.prototype.options = {};

    CBPGridGallery.prototype._init = function () {
        // main grid
        this.grid = this.el.querySelector('section.lms_blog_cat_wrap > ul.lms_blog_cat_grid');
        // main grid items
        this.gridItems = [].slice.call(this.grid.querySelectorAll('li:not(.lms-grid-sizer)'));
        // items total
        this.itemsCount = this.gridItems.length;
        // slideshow grid
        //this.slideshow = this.el.querySelector( 'section.slideshow > ul' );
        // slideshow grid items
        //this.slideshowItems = [].slice.call( this.slideshow.children );
        // index of current slideshow item
        this.current = -1;
        // slideshow control buttons
        this.ctrlPrev = this.el.querySelector('section.slideshow > nav > span.nav-prev');
        this.ctrlNext = this.el.querySelector('section.slideshow > nav > span.nav-next');
        this.ctrlClose = this.el.querySelector('section.slideshow > nav > span.nav-close');
        // init masonry grid
        this._initMasonry();
        // init events
        this._initEvents();
    };

    CBPGridGallery.prototype._initMasonry = function () {
        var grid = this.grid;
        imagesLoaded(grid, function () {
            new Masonry(grid, {
                itemSelector: 'li',
                columnWidth: grid.querySelector('.lms-grid-sizer')
            });
        });
    };

    CBPGridGallery.prototype._initEvents = function () {
        var self = this;

        // open the slideshow when clicking on the main grid items
        this.gridItems.forEach(function (item, idx) {
            item.addEventListener('click', function () {
                //self._openSlideshow( idx );
            });
        });

        // slideshow controls
        //this.ctrlPrev.addEventListener( 'click', function() { self._navigate( 'prev' ); } );
        //this.ctrlNext.addEventListener( 'click', function() { self._navigate( 'next' ); } );
        //this.ctrlClose.addEventListener( 'click', function() { self._closeSlideshow(); } );
        // window resize
        window.addEventListener('resize', function () {
            self._resizeHandler();
        });

        // keyboard navigation events
        document.addEventListener('keydown', function (ev) {
            if (self.isSlideshowVisible) {
                var keyCode = ev.keyCode || ev.which;

                switch (keyCode) {
                case 37:
                    self._navigate('prev');
                    break;
                case 39:
                    self._navigate('next');
                    break;
                case 27:
                    self._closeSlideshow();
                    break;
                }
            }
        });

        // trick to prevent scrolling when slideshow is visible
        window.addEventListener('scroll', function () {
            if (self.isSlideshowVisible) {
                window.scrollTo(self.scrollPosition ? self.scrollPosition.x : 0, self.scrollPosition ? self.scrollPosition.y : 0);
            } else {
                self.scrollPosition = {
                    x: window.pageXOffset || docElem.scrollLeft,
                    y: window.pageYOffset || docElem.scrollTop
                };
            }
        });
    };

    CBPGridGallery.prototype._openSlideshow = function (pos) {
        this.isSlideshowVisible = true;
        this.current = pos;

        classie.addClass(this.el, 'slideshow-open');

        /* position slideshow items */

        // set viewport items (current, next and previous)
        this._setViewportItems();

        // add class "current" and "show" to currentItem
        classie.addClass(this.currentItem, 'current');
        classie.addClass(this.currentItem, 'show');

        // add class show to next and previous items
        // position previous item on the left side and the next item on the right side
        if (this.prevItem) {
            classie.addClass(this.prevItem, 'show');
            var translateVal = Number(-1 * (getViewportW() / 2 + this.prevItem.offsetWidth / 2));
            setTransform(this.prevItem, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)');
        }
        if (this.nextItem) {
            classie.addClass(this.nextItem, 'show');
            var translateVal = Number(getViewportW() / 2 + this.nextItem.offsetWidth / 2);
            setTransform(this.nextItem, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)');
        }
    };

    CBPGridGallery.prototype._navigate = function (dir) {
        if (this.isAnimating) return;
        if (dir === 'next' && this.current === this.itemsCount - 1 || dir === 'prev' && this.current === 0) {
            this._closeSlideshow();
            return;
        }

        this.isAnimating = true;

        // reset viewport items
        this._setViewportItems();

        var self = this,
            itemWidth = this.currentItem.offsetWidth,
            // positions for the centered/current item, both the side items and the incoming ones
            transformLeftStr = support.support3d ? 'translate3d(-' + Number(getViewportW() / 2 + itemWidth / 2) + 'px, 0, -150px)' : 'translate(-' + Number(getViewportW() / 2 + itemWidth / 2) + 'px)',
            transformRightStr = support.support3d ? 'translate3d(' + Number(getViewportW() / 2 + itemWidth / 2) + 'px, 0, -150px)' : 'translate(' + Number(getViewportW() / 2 + itemWidth / 2) + 'px)',
            transformCenterStr = '',
            transformOutStr, transformIncomingStr,
            // incoming item
            incomingItem;

        if (dir === 'next') {
            transformOutStr = support.support3d ? 'translate3d( -' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px, 0, -150px )' : 'translate(-' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px)';
            transformIncomingStr = support.support3d ? 'translate3d( ' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px, 0, -150px )' : 'translate(' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px)';
        } else {
            transformOutStr = support.support3d ? 'translate3d( ' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px, 0, -150px )' : 'translate(' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px)';
            transformIncomingStr = support.support3d ? 'translate3d( -' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px, 0, -150px )' : 'translate(-' + Number((getViewportW() * 2) / 2 + itemWidth / 2) + 'px)';
        }

        // remove class animatable from the slideshow grid (if it has already)
        classie.removeClass(self.slideshow, 'animatable');

        if (dir === 'next' && this.current < this.itemsCount - 2 || dir === 'prev' && this.current > 1) {
            // we have an incoming item!
            incomingItem = this.slideshowItems[dir === 'next' ? this.current + 2 : this.current - 2];
            setTransform(incomingItem, transformIncomingStr);
            classie.addClass(incomingItem, 'show');
        }

        var slide = function () {
                // add class animatable to the slideshow grid
                classie.addClass(self.slideshow, 'animatable');

                // overlays:
                classie.removeClass(self.currentItem, 'current');
                var nextCurrent = dir === 'next' ? self.nextItem : self.prevItem;
                classie.addClass(nextCurrent, 'current');

                setTransform(self.currentItem, dir === 'next' ? transformLeftStr : transformRightStr);

                if (self.nextItem) {
                    setTransform(self.nextItem, dir === 'next' ? transformCenterStr : transformOutStr);
                }

                if (self.prevItem) {
                    setTransform(self.prevItem, dir === 'next' ? transformOutStr : transformCenterStr);
                }

                if (incomingItem) {
                    setTransform(incomingItem, dir === 'next' ? transformRightStr : transformLeftStr);
                }

                var onEndTransitionFn = function (ev) {
                        if (support.transitions) {
                            if (ev.propertyName.indexOf('transform') === -1) return false;
                            this.removeEventListener(transEndEventName, onEndTransitionFn);
                        }

                        if (self.prevItem && dir === 'next') {
                            classie.removeClass(self.prevItem, 'show');
                        } else if (self.nextItem && dir === 'prev') {

                            classie.removeClass(self.nextItem, 'show');
                        }

                        if (dir === 'next') {
                            self.prevItem = self.currentItem;
                            self.currentItem = self.nextItem;
                            if (incomingItem) {
                                self.nextItem = incomingItem;
                            }
                        } else {
                            self.nextItem = self.currentItem;
                            self.currentItem = self.prevItem;
                            if (incomingItem) {
                                self.prevItem = incomingItem;
                            }
                        }

                        self.current = dir === 'next' ? self.current + 1 : self.current - 1;
                        self.isAnimating = false;
                    };

                if (support.transitions) {
                    self.currentItem.addEventListener(transEndEventName, onEndTransitionFn);
                } else {
                    onEndTransitionFn();
                }
            };

        setTimeout(slide, 25);
    }

    CBPGridGallery.prototype._closeSlideshow = function (pos) {
        // remove class slideshow-open from the grid gallery elem
        classie.removeClass(this.el, 'slideshow-open');
        // remove class animatable from the slideshow grid
        classie.removeClass(this.slideshow, 'animatable');

        var self = this,
            onEndTransitionFn = function (ev) {
                if (support.transitions) {
                    if (ev.target.tagName.toLowerCase() !== 'ul') return;
                    this.removeEventListener(transEndEventName, onEndTransitionFn);
                }
                // remove classes show and current from the slideshow items
                classie.removeClass(self.currentItem, 'current');
                classie.removeClass(self.currentItem, 'show');

                if (self.prevItem) {
                    classie.removeClass(self.prevItem, 'show');
                }
                if (self.nextItem) {
                    classie.removeClass(self.nextItem, 'show');
                }

                // also reset any transforms for all the items
                self.slideshowItems.forEach(function (item) {
                    setTransform(item, '');
                });

                self.isSlideshowVisible = false;
            };

        if (support.transitions) {
            this.el.addEventListener(transEndEventName, onEndTransitionFn);
        } else {
            onEndTransitionFn();
        }
    };

    CBPGridGallery.prototype._setViewportItems = function () {
        this.currentItem = null;
        this.prevItem = null;
        this.nextItem = null;

        if (this.current > 0) {
            this.prevItem = this.slideshowItems[this.current - 1];
        }
        if (this.current < this.itemsCount - 1) {
            this.nextItem = this.slideshowItems[this.current + 1];
        }
        this.currentItem = this.slideshowItems[this.current];
    }

    // taken from https://github.com/desandro/vanilla-masonry/blob/master/masonry.js by David DeSandro
    // original debounce by John Hann
    // http://unscriptable.com/index.php/2009/03/20/debouncing-javascript-methods/
    CBPGridGallery.prototype._resizeHandler = function () {
        var self = this;

        function delayed() {
            self._resize();
            self._resizeTimeout = null;
        }
        if (this._resizeTimeout) {
            clearTimeout(this._resizeTimeout);
        }
        this._resizeTimeout = setTimeout(delayed, 50);
    }

    CBPGridGallery.prototype._resize = function () {
        if (this.isSlideshowVisible) {
            // update width value
            if (this.prevItem) {
                var translateVal = Number(-1 * (getViewportW() / 2 + this.prevItem.offsetWidth / 2));
                setTransform(this.prevItem, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)');
            }
            if (this.nextItem) {
                var translateVal = Number(getViewportW() / 2 + this.nextItem.offsetWidth / 2);
                setTransform(this.nextItem, support.support3d ? 'translate3d(' + translateVal + 'px, 0, -150px)' : 'translate(' + translateVal + 'px)');
            }
        }
    }

    // add to global namespace
    window.CBPGridGallery = CBPGridGallery;

})(window);





/*!
 * classie - class helper functions
 * from bonzo https://github.com/ded/bonzo
 * 
 * classie.has( elem, 'my-class' ) -> true/false
 * classie.add( elem, 'my-new-class' )
 * classie.remove( elem, 'my-unwanted-class' )
 * classie.toggle( elem, 'my-class' )
 */

/*jshint browser: true, strict: true, undef: true */
/*global define: false */

(function (window) {

    'use strict';

    // class helper functions from bonzo https://github.com/ded/bonzo

    function classReg(className) {
        return new RegExp("(^|\\s+)" + className + "(\\s+|$)");
    }

    // classList support for class management
    // altho to be fair, the api sucks because it won't accept multiple classes at once
    var hasClass, addClass, removeClass;

    if ('classList' in document.documentElement) {
        hasClass = function (elem, c) {
            return elem.classList.contains(c);
        };
        addClass = function (elem, c) {
            elem.classList.add(c);
        };
        removeClass = function (elem, c) {
            elem.classList.remove(c);
        };
    } else {
        hasClass = function (elem, c) {
            return classReg(c).test(elem.className);
        };
        addClass = function (elem, c) {
            if (!hasClass(elem, c)) {
                elem.className = elem.className + ' ' + c;
            }
        };
        removeClass = function (elem, c) {
            elem.className = elem.className.replace(classReg(c), ' ');
        };
    }

    function toggleClass(elem, c) {
        var fn = hasClass(elem, c) ? removeClass : addClass;
        fn(elem, c);
    }

    var classie = {
        // full names
        hasClass: hasClass,
        addClass: addClass,
        removeClass: removeClass,
        toggleClass: toggleClass,
        // short names
        has: hasClass,
        add: addClass,
        remove: removeClass,
        toggle: toggleClass
    };

    // transport
    if (typeof define === 'function' && define.amd) {
        // AMD
        define(classie);
    } else {
        // browser global
        window.classie = classie;
    }

})(window);;