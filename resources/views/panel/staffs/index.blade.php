@extends('layouts.app')

@section('content')
    <section id="ClientList" class="openTicket">

        <div class="container custom_width">

            <!-- Header -->
            <div class="row">

                <div class="col-lg-12">




                    <div class="FilterBy d_flex justify-content-between">

                        <div class="d-flex">
                            <!-- Filter By Item -->
                            <div class="FilterBy_item d_flex">
                                <h3>Filter By:</h3>
                                <div class="dropdown_part">
                            <span class="dropdown-toggle d_flex" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                Joining Date
                                <div class="arrow">
                                    <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                              fill="#747474"/>
                                    </svg>
                                </div>
                            </span>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>

                                        <!-- up arrow -->
                                        <div class="up_arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                    fill="#F3ECFF"/>
                                            </svg>
                                        </div>

                                    </ul>

                                </div>

                            </div>

                            <!-- Filter By Item -->
                            <div class="FilterBy_item d_flex">
                                <h3>Filter By:</h3>
                                <div class="dropdown_part">
                            <span class="dropdown-toggle d_flex" id="dropdownMenuButton1" data-bs-toggle="dropdown"
                                  aria-expanded="false">
                                Status
                                <div class="arrow">
                                    <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                         xmlns="http://www.w3.org/2000/svg">
                                        <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                              fill="#747474"/>
                                    </svg>
                                </div>
                            </span>

                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                        <li><a class="dropdown-item" href="#">Action</a></li>
                                        <li><a class="dropdown-item" href="#">Another action</a></li>
                                        <li><a class="dropdown-item" href="#">Something else here</a></li>

                                        <!-- up arrow -->
                                        <div class="up_arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path
                                                    d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                    fill="#F3ECFF"/>
                                            </svg>
                                        </div>

                                    </ul>

                                </div>

                            </div>

                            <!-- Filter By Item -->
                            <div class="FilterBy_item">
                                <div class="custome_input">

                                    <input type="text" name="" placeholder="Search here...">

                                    <div class="search">
                                        <svg width="18" height="18" viewBox="0 0 18 18" fill="none"
                                             xmlns="http://www.w3.org/2000/svg">
                                            <path
                                                d="M16.3078 16.7113L12.6943 13.0914M14.6968 8.25366C14.6968 10.0695 13.9754 11.811 12.6914 13.095C11.4074 14.379 9.66595 15.1003 7.8501 15.1003C6.03425 15.1003 4.29277 14.379 3.00876 13.095C1.72476 11.811 1.00342 10.0695 1.00342 8.25366C1.00342 6.43781 1.72476 4.69633 3.00876 3.41233C4.29277 2.12833 6.03425 1.40698 7.8501 1.40698C9.66595 1.40698 11.4074 2.12833 12.6914 3.41233C13.9754 4.69633 14.6968 6.43781 14.6968 8.25366V8.25366Z"
                                                stroke="#A3A3A3" stroke-width="2" stroke-linecap="round"/>
                                        </svg>
                                    </div>

                                </div>
                            </div>
                        </div>



                        <div class="justify-content-end">
                            <a href="{{ route('admin.staffs.create') }}" class="btn-default">Add New</a>
                        </div>

                    </div>

                </div>

                <!-- Table Part  -->
                <div class="col-lg-12">

                    <div class="table_part">

                        <table class="table">

                            <tr>
                                <th>SL</th>
                                <th>Image</th>
                                <th>Staff Name</th>
                                <th>Staff Contact No.</th>
                                <th>Staff Mail Address</th>
                                <th>Joining Date</th>
                                <th>Role</th>
                                <th>Status</th>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                            <!-- item -->
                            <tr>
                                <td>01</td>
                                <td class="img"><a href="staff_details.html"><img
                                            src="frontend_assets/images/profile.png" alt=""></a></td>
                                <td class="name"><a href="staff_details.html">M.H. Neshad</a></td>
                                <td>01234567890</td>
                                <td>tanya.hill@example.com</td>
                                <td>June 2023</td>
                                <td class="Role">
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Senior Quality Analyst
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Senior Quality Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Data Analyst</a></li>
                                            <li><a class="dropdown-item" href="#">Senior Web Developer</a></li>
                                            <li><a class="dropdown-item" href="#">Inside Sales Head</a></li>
                                            <li><a class="dropdown-item" href="#">Intern</a></li>
                                            <li><a class="dropdown-item" href="#">Senior UI Engineer</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                                <td>
                                    <div class="dropdown_part">
                                    <span class="dropdown-toggle d_flex" id="dropdownMenuButton1"
                                          data-bs-toggle="dropdown" aria-expanded="false">
                                        Active
                                        <div class="arrow">
                                            <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                 xmlns="http://www.w3.org/2000/svg">
                                                <path d="M0.244629 0.501221L5.40989 5.66649L10.5752 0.501221H0.244629Z"
                                                      fill="#747474"/>
                                            </svg>
                                        </div>
                                    </span>

                                        <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">

                                            <li><a class="dropdown-item" href="#">Action</a></li>
                                            <li><a class="dropdown-item" href="#">Another action</a></li>
                                            <li><a class="dropdown-item" href="#">Something else here</a></li>

                                            <!-- up arrow -->
                                            <div class="up_arrow">
                                                <svg width="11" height="6" viewBox="0 0 11 6" fill="none"
                                                     xmlns="http://www.w3.org/2000/svg">
                                                    <path
                                                        d="M10.3306 5.16528L5.1653 1.6953e-05L3.48091e-05 5.16528L10.3306 5.16528Z"
                                                        fill="#F3ECFF"/>
                                                </svg>
                                            </div>

                                        </ul>

                                    </div>
                                </td>
                            </tr>

                        </table>

                    </div>

                </div>

            </div>

        </div>

    </section>
@endsection
