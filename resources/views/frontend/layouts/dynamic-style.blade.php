<style>
    :root {
        --white-color: #fff;
        /* --theme-color: #5e3fd7; */
        --light-purple: rgba(117, 79, 254, 0.1);
        /* --heading-color: #040453; */
        --orange-color: #FC8068;
        --orange-deep: #FF3C16;
        /* --para-color: #52526C; */
        --gray-color: #767588;
        --gray-color2: #929292;
        --disable-color: #B5B4BD;
        --color-green: #45C881;
        --color-light-green: rgba(69, 200, 129, 0.22);
        --color-yellow: #FFC014;
        --light-bg: #F9F8F6;
        --page-bg: #F8F6F0;
        /* --plyr-color-main: #5e3fd7; */
        --border-color: rgba(0, 0, 0, 0.07);
        --border-color2: rgba(0, 0, 0, 0.09);
        /* --font-jost: 'Jost', sans-serif; */

        --body-font-family: 'Jost', sans-serif;




        --body-font-family: 'Jost', sans-serif;



        /* New Assigned */
        --theme-color: {{ '#5e3fd7' }};
        --plyr-color-main: {{ '#5e3fd7' }};
        /* --theme-color value set here*/
        --heading-color: #040453;
        --body-font-color: #52526C;
        --navbar-bg-color: #030060;

        --gradient-banner-bg:
            linear-gradient(130deg, #ad90c1 0%, rgb(3, 0, 84) 100%),
            linear-gradient(130deg, #09007b 0%, rgba(15, 0, 66, 0) 30%),
            linear-gradient(129.96deg, rgb(255, 47, 47) 10.43%, rgb(0, 4, 96) 92.78%),
            radial-gradient(100% 246.94% at 100% 0%, rgb(255, 255, 255) 0%, rgba(37, 0, 66, 0.8) 100%),
            linear-gradient(121.18deg, rgb(20, 0, 255) 0.45%, rgb(27, 0, 62) 100%),
            linear-gradient(154.03deg, rgb(206, 0, 0) 0%, rgb(255, 0, 61) 74.04%),
            linear-gradient(341.1deg, rgb(178, 91, 186) 7.52%, rgb(16, 0, 119) 77.98%),
            linear-gradient(222.34deg, rgb(169, 0, 0) 12.99%, rgb(0, 255, 224) 87.21%),
            linear-gradient(150.76deg, rgb(183, 213, 0) 15.35%, rgb(34, 0, 170) 89.57%);
        --overlay-bg-opacity: 0;
        --gradient-overlay-bg: rgba(0, 0, 0, 0) !important;

        --footer-gradient-bg:
            linear-gradient(130deg, #ad90c1 0%, rgb(3, 0, 84) 100%),
            linear-gradient(130deg, #09007b 0%, rgba(15, 0, 66, 0) 30%),
            linear-gradient(129.96deg, rgb(255, 47, 47) 10.43%, rgb(0, 4, 96) 92.78%),
            radial-gradient(100% 246.94% at 100% 0%, rgb(255, 255, 255) 0%, rgba(37, 0, 66, 0.8) 100%),
            linear-gradient(121.18deg, rgb(20, 0, 255) 0.45%, rgb(27, 0, 62) 100%),
            linear-gradient(154.03deg, rgb(206, 0, 0) 0%, rgb(255, 0, 61) 74.04%),
            linear-gradient(341.1deg, rgb(178, 91, 186) 7.52%, rgb(16, 0, 119) 77.98%),
            linear-gradient(222.34deg, rgb(169, 0, 0) 12.99%, rgb(0, 255, 224) 87.21%),
            linear-gradient(150.76deg, rgb(183, 213, 0) 15.35%, rgb(34, 0, 170) 89.57%) --theme-color: #5e3fd7;
        --plyr-color-main: #5e3fd7;
        /* --theme-color value set here*/
        --heading-color: #040453;
        --body-font-color: #52526C;
        --navbar-bg-color: #030060;
        --gradient-banner-bg: linear-gradient(130deg, #ad90c1 0%, rgb(3, 0, 84) 100%),
            linear-gradient(130deg, #09007b 0%, rgba(15, 0, 66, 0) 30%),
            linear-gradient(129.96deg, rgb(255, 47, 47) 10.43%, rgb(0, 4, 96) 92.78%),
            radial-gradient(100% 246.94% at 100% 0%, rgb(255, 255, 255) 0%, rgba(37, 0, 66, 0.8) 100%),
            linear-gradient(121.18deg, rgb(20, 0, 255) 0.45%, rgb(27, 0, 62) 100%),
            linear-gradient(154.03deg, rgb(206, 0, 0) 0%, rgb(255, 0, 61) 74.04%),
            linear-gradient(341.1deg, rgb(178, 91, 186) 7.52%, rgb(16, 0, 119) 77.98%),
            linear-gradient(222.34deg, rgb(169, 0, 0) 12.99%, rgb(0, 255, 224) 87.21%),
            linear-gradient(150.76deg, rgb(183, 213, 0) 15.35%, rgb(34, 0, 170) 89.57%);

        --gradient-overlay-bg: linear-gradient(180deg, rgba(0, 0, 61, 0.27) 0%, rgba(1, 1, 52, 0.9) 100%);

        --footer-gradient-bg: linear-gradient(130deg, #ad90c1 0%, rgb(3, 0, 84) 100%),
            linear-gradient(130deg, #09007b 0%, rgba(15, 0, 66, 0) 30%),
            linear-gradient(129.96deg, rgb(255, 47, 47) 10.43%, rgb(0, 4, 96) 92.78%),
            radial-gradient(100% 246.94% at 100% 0%, rgb(255, 255, 255) 0%, rgba(37, 0, 66, 0.8) 100%),
            linear-gradient(121.18deg, rgb(20, 0, 255) 0.45%, rgb(27, 0, 62) 100%),
            linear-gradient(154.03deg, rgb(206, 0, 0) 0%, rgb(255, 0, 61) 74.04%),
            linear-gradient(341.1deg, rgb(178, 91, 186) 7.52%, rgb(16, 0, 119) 77.98%),
            linear-gradient(222.34deg, rgb(169, 0, 0) 12.99%, rgb(0, 255, 224) 87.21%),
            linear-gradient(150.76deg, rgb(183, 213, 0) 15.35%, rgb(34, 0, 170) 89.57%);

    }
</style>