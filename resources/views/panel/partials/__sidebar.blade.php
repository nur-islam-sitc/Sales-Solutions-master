<section id="side_bar">

    <div class="sidebar_content">

        <div class="logo">
            <a href="{{ route('admin.dashboard') }}"><img src="{{ asset('images/logo.png') }}" alt=""></a>
        </div>

        <div class="menuItem">

            <ul>
                <li class="active">

                    <a href="{{ route('admin.dashboard') }}" class="{{ activeMenu('dashboard') }} d_flex">
                        <svg width="22" height="22" viewBox="0 0 22 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M18.7987 0H2.34984C1.05743 0 0 1.05743 0 2.34984V18.7987C0 20.0911 1.05743 21.1485 2.34984 21.1485H18.7987C20.0911 21.1485 21.1485 20.0911 21.1485 18.7987V2.34984C21.1485 1.05743 20.0911 0 18.7987 0ZM2.34984 18.7987V2.34984H9.39934V18.7987H2.34984ZM18.7987 18.7987H11.7492V10.5743H18.7987V18.7987ZM18.7987 8.22442H11.7492V2.34984H18.7987V8.22442Z" fill="#A16CF8"/>
                        </svg>

                        {{ __('Dashboard') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.merchants') }}" class="{{ activeMenu('merchants') }}">
                        <svg width="20" height="26" viewBox="0 0 20 26" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M17.6218 3.34717H2.365C1.71684 3.34717 1.19141 3.87261 1.19141 4.52077V23.2983C1.19141 23.9465 1.71684 24.4719 2.365 24.4719H17.6218C18.2699 24.4719 18.7954 23.9465 18.7954 23.2983V4.52077C18.7954 3.87261 18.2699 3.34717 17.6218 3.34717Z" stroke="#A16CF8" stroke-width="1.67657" stroke-linejoin="round"/>
                            <path d="M6.47267 1V4.52079M13.5143 1V4.52079M5.29907 9.80198H14.6879M5.29907 14.4964H12.3407M5.29907 19.1908H9.99346" stroke="#A16CF8" stroke-width="1.67657" stroke-linecap="round" stroke-linejoin="round"/>
                        </svg>

                        {{ __('Client List')}}
                    </a>
                </li>

                <li>
                    <a href="billing.html" class="d_flex">
                        <svg width="24" height="22" viewBox="0 0 24 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M7.38278 0C6.67134 0 5.98903 0.28262 5.48596 0.785688C4.9829 1.28876 4.70028 1.97106 4.70028 2.68251V12.0713H6.04153V2.68251C6.04153 2.32679 6.18284 1.98563 6.43438 1.7341C6.68591 1.48256 7.02706 1.34125 7.38278 1.34125H16.7716C17.1273 1.34125 17.4684 1.48256 17.72 1.7341C17.9715 1.98563 18.1128 2.32679 18.1128 2.68251V17.4363H14.0891V18.7776H19.4541C20.5212 18.7776 21.5447 18.3536 22.2993 17.599C23.0539 16.8444 23.4778 15.821 23.4778 14.7538V12.0713H19.4541V2.68251C19.4541 1.97106 19.1715 1.28876 18.6684 0.785688C18.1653 0.28262 17.483 0 16.7716 0H7.38278ZM22.1366 14.7538C22.1366 15.4652 21.854 16.1475 21.3509 16.6506C20.8478 17.1537 20.1655 17.4363 19.4541 17.4363V13.4125H22.1366V14.7538ZM9.39467 4.02376C9.2168 4.02376 9.04623 4.09442 8.92046 4.22018C8.79469 4.34595 8.72404 4.51653 8.72404 4.69439C8.72404 4.87225 8.79469 5.04283 8.92046 5.16859C9.04623 5.29436 9.2168 5.36502 9.39467 5.36502H14.7597C14.9375 5.36502 15.1081 5.29436 15.2339 5.16859C15.3597 5.04283 15.4303 4.87225 15.4303 4.69439C15.4303 4.51653 15.3597 4.34595 15.2339 4.22018C15.1081 4.09442 14.9375 4.02376 14.7597 4.02376H9.39467ZM8.72404 7.3769C8.72404 7.19904 8.79469 7.02846 8.92046 6.90269C9.04623 6.77693 9.2168 6.70627 9.39467 6.70627H14.7597C14.9375 6.70627 15.1081 6.77693 15.2339 6.90269C15.3597 7.02846 15.4303 7.19904 15.4303 7.3769C15.4303 7.55476 15.3597 7.72534 15.2339 7.8511C15.1081 7.97687 14.9375 8.04752 14.7597 8.04752H9.39467C9.2168 8.04752 9.04623 7.97687 8.92046 7.8511C8.79469 7.72534 8.72404 7.55476 8.72404 7.3769ZM10.7359 13.4125C11.2695 13.4125 11.7812 13.6245 12.1585 14.0018C12.5358 14.3791 12.7478 14.8908 12.7478 15.4244V19.4482C12.7478 19.9818 12.5358 20.4935 12.1585 20.8708C11.7812 21.2481 11.2695 21.4601 10.7359 21.4601H2.6884C2.15481 21.4601 1.64308 21.2481 1.26578 20.8708C0.888479 20.4935 0.676514 19.9818 0.676514 19.4482V15.4244C0.676514 14.8908 0.888479 14.3791 1.26578 14.0018C1.64308 13.6245 2.15481 13.4125 2.6884 13.4125H10.7359ZM11.4065 19.4482V18.1069C10.873 18.1069 10.3612 18.3189 9.98393 18.6962C9.60663 19.0735 9.39467 19.5852 9.39467 20.1188H10.7359C10.7359 19.941 10.8066 19.7704 10.9323 19.6446C11.0581 19.5188 11.2287 19.4482 11.4065 19.4482ZM11.4065 15.4244C11.2287 15.4244 11.0581 15.3538 10.9323 15.228C10.8066 15.1022 10.7359 14.9317 10.7359 14.7538H9.39467C9.39467 15.2874 9.60663 15.7991 9.98393 16.1764C10.3612 16.5537 10.873 16.7657 11.4065 16.7657V15.4244ZM2.6884 14.7538C2.6884 14.9317 2.61774 15.1022 2.49197 15.228C2.36621 15.3538 2.19563 15.4244 2.01777 15.4244V16.7657C2.55135 16.7657 3.06308 16.5537 3.44038 16.1764C3.81768 15.7991 4.02965 15.2874 4.02965 14.7538H2.6884ZM2.01777 19.4482C2.19563 19.4482 2.36621 19.5188 2.49197 19.6446C2.61774 19.7704 2.6884 19.941 2.6884 20.1188H4.02965C4.02965 19.5852 3.81768 19.0735 3.44038 18.6962C3.06308 18.3189 2.55135 18.1069 2.01777 18.1069V19.4482ZM6.71216 15.4244C6.17857 15.4244 5.66684 15.6364 5.28954 16.0137C4.91224 16.391 4.70028 16.9027 4.70028 17.4363C4.70028 17.9699 4.91224 18.4816 5.28954 18.8589C5.66684 19.2362 6.17857 19.4482 6.71216 19.4482C7.24574 19.4482 7.75747 19.2362 8.13477 18.8589C8.51207 18.4816 8.72404 17.9699 8.72404 17.4363C8.72404 16.9027 8.51207 16.391 8.13477 16.0137C7.75747 15.6364 7.24574 15.4244 6.71216 15.4244Z" fill="#A16CF8"/>
                        </svg>

                        {{ __('Billing') }}
                    </a>
                </li>

                <li>
                    <a href="support_ticket.html">
                        <svg width="23" height="22" viewBox="0 0 23 22" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M21.6673 10.44L11.8594 0.632066C11.4671 0.239749 10.9222 0 10.3228 0H2.69443C1.49568 0 0.514893 0.980792 0.514893 2.17954V9.80792C0.514893 10.4073 0.754642 10.9522 1.15786 11.3554L10.9658 21.1633C11.3581 21.5556 11.903 21.7954 12.5024 21.7954C13.1017 21.7954 13.6466 21.5556 14.0389 21.1524L21.6673 13.524C22.0705 13.1317 22.3103 12.5868 22.3103 11.9875C22.3103 11.3881 22.0596 10.8323 21.6673 10.44ZM12.5024 19.6267L2.69443 9.80792V2.17954H10.3228V2.16864L20.1307 11.9766L12.5024 19.6267Z" fill="#A16CF8"/>
                            <path d="M5.41883 6.53859C6.32163 6.53859 7.05349 5.80673 7.05349 4.90394C7.05349 4.00115 6.32163 3.26929 5.41883 3.26929C4.51604 3.26929 3.78418 4.00115 3.78418 4.90394C3.78418 5.80673 4.51604 6.53859 5.41883 6.53859Z" fill="#A16CF8"/>
                        </svg>

                        {{ __('Support Ticket') }}
                    </a>
                </li>

                <li>
                    <a href="{{ route('admin.staffs') }}">
                        <svg width="23" height="23" viewBox="0 0 23 23" fill="none" xmlns="http://www.w3.org/2000/svg">
                            <path d="M11.316 10.8088C10.5409 10.8006 9.78556 10.5633 9.14504 10.1268C8.50451 9.69021 8.00747 9.0739 7.71648 8.35544C7.4255 7.63697 7.35358 6.84848 7.50979 6.08923C7.666 5.32998 8.04334 4.63391 8.59432 4.08868C9.1453 3.54344 9.84528 3.1734 10.6061 3.02515C11.367 2.8769 12.1547 2.95707 12.87 3.25556C13.5854 3.55405 14.1965 4.05752 14.6263 4.70259C15.0562 5.34765 15.2855 6.10546 15.2856 6.88061C15.2783 7.92735 14.8564 8.92853 14.1124 9.66482C13.3683 10.4011 12.3628 10.8125 11.316 10.8088ZM11.316 4.33073C10.8136 4.33888 10.3247 4.49533 9.91085 4.78042C9.497 5.06551 9.17662 5.46654 8.98995 5.93313C8.80328 6.39972 8.75865 6.91106 8.86165 7.40293C8.96466 7.89481 9.21072 8.34527 9.56892 8.69776C9.92711 9.05024 10.3815 9.28902 10.8749 9.3841C11.3684 9.47918 11.879 9.42633 12.3425 9.23218C12.806 9.03803 13.2018 8.71124 13.4802 8.29286C13.7586 7.87448 13.9072 7.38316 13.9073 6.88061C13.9 6.19943 13.6233 5.54882 13.1378 5.07101C12.6522 4.5932 11.9973 4.32705 11.316 4.33073Z" fill="#A16CF8"/>
                            <path d="M11.3158 10.8088C10.5407 10.8006 9.78535 10.5633 9.14482 10.1268C8.50429 9.69021 8.00725 9.0739 7.71626 8.35544C7.42528 7.63697 7.35336 6.84848 7.50957 6.08923C7.66578 5.32998 8.04313 4.63391 8.5941 4.08868C9.14508 3.54344 9.84506 3.1734 10.6059 3.02515C11.3667 2.8769 12.1544 2.95707 12.8698 3.25556C13.5852 3.55405 14.1963 4.05752 14.6261 4.70259C15.0559 5.34765 15.2853 6.10546 15.2854 6.88061C15.2781 7.92735 14.8562 8.92853 14.1122 9.66482C13.3681 10.4011 12.3626 10.8125 11.3158 10.8088ZM11.3158 4.33073C10.8133 4.33888 10.3245 4.49533 9.91063 4.78042C9.49678 5.06551 9.1764 5.46654 8.98973 5.93313C8.80306 6.39972 8.75843 6.91106 8.86144 7.40293C8.96444 7.89481 9.2105 8.34527 9.5687 8.69776C9.9269 9.05024 10.3813 9.28902 10.8747 9.3841C11.3682 9.47918 11.8788 9.42633 12.3423 9.23218C12.8058 9.03803 13.2016 8.71124 13.48 8.29286C13.7584 7.87448 13.907 7.38316 13.9071 6.88061C13.8998 6.19943 13.6231 5.54882 13.1376 5.07101C12.652 4.5932 11.997 4.32705 11.3158 4.33073ZM13.721 11.7323C10.6643 11.2004 7.51744 11.6845 4.76195 13.1106C4.56635 13.2192 4.40438 13.3795 4.29377 13.574C4.18317 13.7685 4.12817 13.9896 4.13481 14.2132V16.6666C4.13481 16.8494 4.20742 17.0247 4.33666 17.1539C4.46591 17.2832 4.6412 17.3558 4.82397 17.3558C5.00675 17.3558 5.18204 17.2832 5.31128 17.1539C5.44052 17.0247 5.51313 16.8494 5.51313 16.6666V14.3028C8.06829 13.0207 10.974 12.6139 13.783 13.145L13.721 11.7323Z" fill="#A16CF8"/>
                            <path d="M21.3641 14.7301H16.7467V13.7102C16.7467 13.5274 16.6741 13.3521 16.5449 13.2228C16.4157 13.0936 16.2404 13.021 16.0576 13.021C15.8748 13.021 15.6995 13.0936 15.5703 13.2228C15.441 13.3521 15.3684 13.5274 15.3684 13.7102V14.7301H10.3376C10.1548 14.7301 9.97953 14.8027 9.85029 14.932C9.72104 15.0612 9.64844 15.2365 9.64844 15.4193V22.3108C9.64844 22.4936 9.72104 22.6689 9.85029 22.7981C9.97953 22.9274 10.1548 23 10.3376 23H21.3641C21.5469 23 21.7222 22.9274 21.8514 22.7981C21.9806 22.6689 22.0533 22.4936 22.0533 22.3108V15.4193C22.0533 15.2365 21.9806 15.0612 21.8514 14.932C21.7222 14.8027 21.5469 14.7301 21.3641 14.7301ZM20.6749 21.6217H11.0268V16.1084H15.3684V16.391C15.3684 16.5737 15.441 16.749 15.5703 16.8783C15.6995 17.0075 15.8748 17.0801 16.0576 17.0801C16.2404 17.0801 16.4157 17.0075 16.5449 16.8783C16.6741 16.749 16.7467 16.5737 16.7467 16.391V16.1084H20.6749V21.6217Z" fill="#A16CF8"/>
                            <path d="M13.6522 18.4654H17.7596V19.4302H13.6522V18.4654ZM6.09214 8.00398C4.18418 8.0359 2.30929 8.50757 0.613349 9.38229C0.428905 9.47972 0.274406 9.62544 0.166373 9.80388C0.0583387 9.98232 0.000831707 10.1868 0 10.3954V12.5317C0 12.7145 0.0726073 12.8898 0.201849 13.019C0.331091 13.1483 0.506381 13.2209 0.689157 13.2209C0.871932 13.2209 1.04722 13.1483 1.17646 13.019C1.30571 12.8898 1.37831 12.7145 1.37831 12.5317V10.5332C2.99873 9.72661 4.79278 9.33135 6.60212 9.38229C6.36539 8.95038 6.19356 8.48596 6.09214 8.00398ZM21.4397 9.3754C19.9186 8.5775 18.2469 8.10793 16.5329 7.99709C16.4319 8.47822 16.2625 8.94238 16.0298 9.3754C17.6445 9.41405 19.2307 9.80942 20.6747 10.5332V12.5317C20.6747 12.7145 20.7473 12.8898 20.8765 13.019C21.0058 13.1483 21.1811 13.2209 21.3639 13.2209C21.5466 13.2209 21.7219 13.1483 21.8512 13.019C21.9804 12.8898 22.053 12.7145 22.053 12.5317V10.3954C22.0534 10.1856 21.9965 9.9797 21.8884 9.79994C21.7803 9.62018 21.6251 9.47338 21.4397 9.3754ZM5.9681 6.88066V6.41892C5.42822 6.34667 4.93701 6.06899 4.59672 5.64369C4.25643 5.21838 4.09328 4.67822 4.14124 4.13565C4.18919 3.59307 4.44455 3.0899 4.85416 2.73087C5.26377 2.37184 5.79606 2.18462 6.34024 2.20817C6.90626 2.20715 7.45029 2.42724 7.85638 2.82152C8.21467 2.526 8.60819 2.276 9.02795 2.07723C8.55906 1.53808 7.9378 1.15365 7.24606 0.974632C6.55432 0.795611 5.82457 0.830396 5.15299 1.0744C4.48141 1.31841 3.89954 1.76018 3.48405 2.34149C3.06857 2.92281 2.83898 3.61637 2.82554 4.33078C2.84 5.20515 3.17991 6.04272 3.77885 6.6799C4.3778 7.31708 5.19277 7.70809 6.06458 7.77656C6.00612 7.48135 5.97383 7.18155 5.9681 6.88066ZM15.6921 0.829862C15.2185 0.829966 14.7497 0.924487 14.313 1.1079C13.8764 1.29131 13.4807 1.55993 13.1491 1.89805C13.615 2.06688 14.0556 2.29875 14.4585 2.58721C14.7802 2.36388 15.1565 2.23204 15.5473 2.20577C15.9381 2.17949 16.3287 2.25977 16.6774 2.43802C17.0261 2.61628 17.3199 2.88584 17.5275 3.21796C17.7351 3.55008 17.8486 3.93231 17.856 4.32389C17.8517 4.7261 17.7335 5.11887 17.5152 5.45671C17.2969 5.79455 16.9874 6.06364 16.6225 6.23285C16.6502 6.44536 16.664 6.65945 16.6638 6.87376C16.662 7.15078 16.6389 7.42725 16.5949 7.70075C17.3457 7.50774 18.0115 7.07195 18.4889 6.46121C18.9663 5.85046 19.2284 5.09904 19.2344 4.32389C19.2253 3.39167 18.8476 2.50093 18.1839 1.84626C17.5202 1.19158 16.6244 0.826176 15.6921 0.829862Z" fill="#A16CF8"/>
                        </svg>

                        Staff List
                    </a>
                </li>


            </ul>

        </div>

    </div>

</section>
