module.exports = {
    entry: [
        "./public/packages/material-design-lite/material.min.js",
        "./public/packages/mdl-select-component/mdl-selectfield.min.js"
    ],
    output: {
        path: "./public/assets/css/",
        filename: "bundle.js"
    }
}
