// CodeMirror, copyright (c) by Marijn Haverbeke and others
// Distributed under an MIT license: http://codemirror.net/LICENSE
// Apache mode by gloony

(function (mod) {
    if (typeof exports == "object" && typeof module == "object")
        mod(require("../../lib/codemirror"));
    else if (typeof define == "function" && define.amd)
        define(["../../lib/codemirror"], mod);
    else // Plain browser env
        mod(CodeMirror);
})(function (CodeMirror) {
    "use strict";

    CodeMirror.defineMode("apache", function (config) {
        return {
            token: function (stream, state) {
                var sol = stream.sol() || state.afterSection;
                var eol = stream.eol();

                state.afterSection = false;

                if (sol) {
                    if (state.nextMultiline) {
                        state.inMultiline = true;
                        state.nextMultiline = false;
                    } else {
                        state.position = "def";
                    }
                }

                if (eol && !state.nextMultiline) {
                    state.inMultiline = false;
                    state.position = "def";
                }

                if (sol) {
                    while (stream.eatSpace()) { }
                }

                var ch = stream.next();

                if (sol && (ch === "#")) {
                    state.position = "comment";
                    stream.skipToEnd();
                    return "comment";
                } else if (ch === "!" && stream.peek() !== " ") {
                    return "number";
                } else if (ch === " ") {
                    if (stream.peek() === "[") {
                        if (stream.skipTo(']')) {
                            stream.next();
                        } else {
                            stream.skipToEnd();
                        }
                        return "keyword";
                    } else if (stream.peek() === "(") {
                        if (stream.skipTo(')')) {
                            stream.next();
                        } else {
                            stream.skipToEnd();
                        }
                        return "string";
                    } else {
                        state.position = "unit";
                        return "unit";
                    }
                } else if (ch === '"') {
                    if (stream.skipTo('"')) {
                        stream.next();
                    } else {
                        stream.skipToEnd();
                    }
                    return "quote";
                } else if (sol && (ch === "<")) {
                    if (stream.skipTo('>')) {
                        stream.next();
                    } else {
                        stream.skipToEnd();
                    }
                    return "meta";
                } else if (ch === '%') {
                    if (stream.peek() === "{") {
                        if (stream.skipTo('}')) {
                            stream.next();
                        } else {
                            stream.skipToEnd();
                        }
                        return "operator";
                    }
                } else if (ch === '$') {
                    if (!isNaN(stream.peek()) && stream.peek() !== " ") {
                        while (!isNaN(stream.peek()) && stream.peek() !== " ") {
                            stream.next();
                        }
                        return "operator";
                    }
                } else if (ch === '\\') {
                    if (stream.peek() === ".") {
                        if (stream.skipTo(' ')) {
                            stream.next();
                        } else {
                            stream.skipToEnd();
                        }
                        return "string";
                    }
                } else if (ch === '.') {
                    if (stream.peek() === "*") {
                        if (stream.skipTo(' ')) {
                            stream.next();
                        } else {
                            stream.skipToEnd();
                        }
                        return "string";
                    }
                } else if (ch === '^') {
                    if (stream.skipTo(' ')) {
                        stream.next();
                    } else {
                        stream.skipToEnd();
                    }
                    return "string";
                }

                return state.position;
            },

            // electricInput: /<\/[\s\w:]+>$/,
            lineComment: "#",
            fold: "brace",

            startState: function () {
                return {
                    position: "def",
                    nextMultiline: false,
                    inMultiline: false,
                    afterSection: false
                };
            }

        };
    });

    CodeMirror.defineMIME("text/apache", "apache");
    CodeMirror.defineMIME("text/htaccess", "apache");

});
