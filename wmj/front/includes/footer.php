<div class="bottom"></div>  
<div class="footer"> 
    <div class="footer_content">
        <div class="contact_info">
            whimingj@gmail.com <br>
            @whi_ming <br>
            linkedIn
        </div>
        <div class="location">
            Montreal, Qc <br>
            Canada
        </div>
        <div class="language_control">
            <div class="selected_language">
                EN
            </div>
            |
            <div>
                FR
            </div>
        </div>
    </div>
</div>
<style>
    .page_wrapper{
    min-height: calc(100vh + 300px);
    }
    .bottom{
        z-index: 1;
        height: 300px;
        background-color: yellow;
        position: relative;
        opacity: 0;
        /* background-color: var(--footer_secondary_colour); */
    }

    .footer{
        z-index: 1;
        position: relative;
        position: fixed;
        bottom: 0;

        min-width: 100%;

        padding: 20px 100px;
        padding-top:300px;

        font-size: var(--footer_font_size);
        font-weight: var(--footer_secondary_weight);
        letter-spacing: var(--footer_secondary_spacing);

        color: var(--footer_primary_colour);
        background-color: var(--footer_secondary_colour);
    }
    .footer .footer_content{


        animation: footer_appear linear;
        animation-timeline: scroll();
        animation-range: entry 0% cover 90%;
        animation-fill-mode: forwards;
    }
    .footer .contact_info{
        font-weight: var(--footer_primary_weight);
        letter-spacing: var(--footer_primary_spacing);
    }
    .footer .location{
        text-align: right;
    }
    .footer .language_control{
        display: flex;
        justify-content: center;
    }
    .footer .language_control div{
        margin: 0px 10px;
        margin-top: 2px;
    }
    .footer .selected_language{
        font-weight: var(--footer_primary_weight);
    }
    /* animations */
    @keyframes footer_appear{
    from {
        top: 150px;
    }
    to {
        top: 0px;
    }
    }
</style>