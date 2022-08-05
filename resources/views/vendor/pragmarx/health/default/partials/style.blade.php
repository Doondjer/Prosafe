<style>

    h1, h3 {
        font-size: {{ 3.5 * config('health.style.multiplier', 1) }}em;
    }

    div.btn.single h3 {
        margin: 0;
    }

    h2 {
        font-size: {{ 2.5 * config('health.style.multiplier', 1) }}em;
    }

    .btn {
        margin-top: {{ 25 * config('health.style.multiplier', 1) }}px;
        min-height: {{ 5 * config('health.style.multiplier', 1) }}px;
    }

    .btn.single {
        text-align: left;
    }
    .info-icon {
        margin-top: 7px;
        width: 1.8em;
        opacity: .5;
    }
    .color-success {
        color: green;
        fill: green;
    }
    .color-danger {
        color: #ffa8c4;
        fill: red;
    }
    .col, .col-1, .col-2, .col-3, .col-4, .col-5, .col-6, .col-7, .col-8, .col-9, .col-10, .col-11, .col-12, .col-auto, .col-lg, .col-lg-1, .col-lg-2, .col-lg-3, .col-lg-4, .col-lg-5, .col-lg-6, .col-lg-7, .col-lg-8, .col-lg-9, .col-lg-10, .col-lg-11, .col-lg-12, .col-lg-auto, .col-md, .col-md-1, .col-md-2, .col-md-3, .col-md-4, .col-md-5, .col-md-6, .col-md-7, .col-md-8, .col-md-9, .col-md-10, .col-md-11, .col-md-12, .col-md-auto, .col-sm, .col-sm-1, .col-sm-2, .col-sm-3, .col-sm-4, .col-sm-5, .col-sm-6, .col-sm-7, .col-sm-8, .col-sm-9, .col-sm-10, .col-sm-11, .col-sm-12, .col-sm-auto, .col-xl, .col-xl-1, .col-xl-2, .col-xl-3, .col-xl-4, .col-xl-5, .col-xl-6, .col-xl-7, .col-xl-8, .col-xl-9, .col-xl-10, .col-xl-11, .col-xl-12, .col-xl-auto {
        position: relative;
        width: 100%;
        padding-right: 15px;
        padding-left: 15px;
    }
    .col-6 {
        flex: 0 0 50%;
        max-width: 50%;
    }
    @media (min-width:576px) {
        .col-sm-12 {
            flex: 0 0 100%;
            max-width: 100%;
        }
        .form-inline .form-group {
            flex: 0 0 auto;
            flex-flow: row wrap;
        }
        .form-inline .form-group, .form-inline label {
            display: flex;
            align-items: center;
            margin-bottom: 0;
        }
        .ml-sm-3, .mx-sm-3 {
            margin-left: 1rem !important;
        }
        .mr-sm-3, .mx-sm-3 {
            margin-right: 1rem !important;
        }
    }
    @media (min-width:768px) {
        .col-md-6 {
            flex: 0 0 50%;
            max-width: 50%;
        }
        .col-md-4 {
            flex: 0 0 33.3333333333%;
            max-width: 33.3333333333%;
        }
        .col-md-8 {
            flex: 0 0 66.6666666667%;
            max-width: 66.6666666667%;
        }
    }
    @media (min-width:992px) {
        .col-lg-4 {
            flex: 0 0 33.3333333333%;
            max-width: 33.3333333333%;
        }
    }
    @media (min-width:1200px) {
        .col-xl-3 {
            flex: 0 0 25%;
            max-width: 25%;
        }
    }
    .row {
        display: flex;
        flex-wrap: wrap;
        margin-right: -15px;
        margin-left: -15px;
    }
    .btn-block {
        display: block;
        width: 100%;
    }
    .title {
        font-size: 1.2em;
        font-weight: 100;
        margin-top: 1px;
        position: relative;
    }
    .text-left {
        text-align: left !important;
    }
    .subtitle {
        line-height: 10px;
        font-size: 1em;
        color: #00f;
    }
    .subtitle, .title {
        margin-bottom: 1px;
    }
    .d-flex {
        display: flex !important;
    }
    .text-right {
        text-align: right !important;
    }
    .chart {
        margin: 7px -50px -7px -7px;
    }
    .color-danger-background{
        background-color:#ffe5c4
    }
    .form-inline {
        display: flex;
        flex-flow: row wrap;
        align-items: center;
    }
    .float-right {
        float: right !important;
    }
</style>
