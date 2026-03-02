<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Create_News -> Word create</title>
    <link rel="stylesheet" href="../../../styles/admin/forms/forms.css">
     <script defer src="../../../scripts/timenow.js"></script>
     <script defer src="../../../scripts/sidebarcolor.js"></script>
  </head>
  <body>
    <div class="wrapper">
      <div class="top">
        <header>
          <div class="header-block">
            <div class="header-logo-box">
              <div class="header-logo">
                <img src="../../../assets/logo/Logo-admin2.png" alt="logo" />
              </div>
            </div>
            <div class="menu-box">
              <div class="menu">
                <div class="menu-item-box">
                  <a href="../../../index.html" class="menu-item">Home</a>
                </div>
                <div class="menu-item-box">
                  <a href="../../category/index.html" class="menu-item">Categories</a>
                </div>
                <div class="menu-item-box">
                  <a href="../../news/index.html" class="menu-item">All News</a>
                </div>
                <div class="menu-item-box">
                  <a href="../../about.html" class="menu-item">About</a>
                </div>
              </div>
            </div>
            <div class="services-box">
              <div class="services">
                <div class="service-time">
                  <p id="currentTime"></p>
                </div>
                <button class="service-button" onclick="location.href='../../../index.html'">Sign Out</button>
              </div>
            </div>
          </div>
        </header>
        <main>
          <div class="main-block">
            <div class="sidebar">
              <div class="sidebar-head">
                <div class="service-time">
                  <p id="currentTimeSidebar"></p>
                </div>
              </div>
              <div class="sidebar-menu-block">
                <div class="sidebar-menu-box" id="menuStart">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuStart" d="M12 20V4" stroke="#1B1357" stroke-width="2.8" />
                    <path id="iconMenuStart2"
                      d="M17 20L17 13"
                      stroke="#1B1357"
                      stroke-width="2.8"
                    />
                    <path id="iconMenuStart3" d="M7 20L7 9" stroke="#1B1357" stroke-width="2.8" />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuStart" onclick="location.href='../../admin/index.html'">Start</button>
                </div>
                <div class="sidebar-menu-box" id="menuHome">
                  <svg
                    class="menu-icon"                    
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id ="iconMenuHome"
                      d="M3 8.22222L11 2L19 8.22222V18C19 18.4715 18.8127 18.9237 18.4793 19.2571C18.1459 19.5905 17.6937 19.7778 17.2222 19.7778H4.77778C4.30628 19.7778 3.8541 19.5905 3.5207 19.2571C3.1873 18.9237 3 18.4715 3 18V8.22222Z"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path id ="iconMenuHome2"
                      d="M8.33331 19.7778V10.8889H13.6666V19.7778"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuHome" onclick="location.href='../../admin/home/index.html'">Home</button>
                </div>
                <div class="sidebar-menu-box" id="menuCategories">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuCategories"
                      d="M10 3H4C3.73478 3 3.48043 3.10536 3.29289 3.29289C3.10536 3.48043 3 3.73478 3 4V10C3 10.2652 3.10536 10.5196 3.29289 10.7071C3.48043 10.8946 3.73478 11 4 11H10C10.2652 11 10.5196 10.8946 10.7071 10.7071C10.8946 10.5196 11 10.2652 11 10V4C11 3.73478 10.8946 3.48043 10.7071 3.29289C10.5196 3.10536 10.2652 3 10 3ZM9 9H5V5H9V9ZM20 13H14C13.7348 13 13.4804 13.1054 13.2929 13.2929C13.1054 13.4804 13 13.7348 13 14V20C13 20.2652 13.1054 20.5196 13.2929 20.7071C13.4804 20.8946 13.7348 21 14 21H20C20.2652 21 20.5196 20.8946 20.7071 20.7071C20.8946 20.5196 21 20.2652 21 20V14C21 13.7348 20.8946 13.4804 20.7071 13.2929C20.5196 13.1054 20.2652 13 20 13ZM19 19H15V15H19V19ZM17 3C14.794 3 13 4.794 13 7C13 9.206 14.794 11 17 11C19.206 11 21 9.206 21 7C21 4.794 19.206 3 17 3ZM17 9C15.897 9 15 8.103 15 7C15 5.897 15.897 5 17 5C18.103 5 19 5.897 19 7C19 8.103 18.103 9 17 9ZM7 13C4.794 13 3 14.794 3 17C3 19.206 4.794 21 7 21C9.206 21 11 19.206 11 17C11 14.794 9.206 13 7 13ZM7 19C5.897 19 5 18.103 5 17C5 15.897 5.897 15 7 15C8.103 15 9 15.897 9 17C9 18.103 8.103 19 7 19Z"
                      fill="#1B1357"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuCategories" onclick="location.href='../../admin/categories/index.html'">Categories</button>
                </div>
                <div class="sidebar-menu-box" id="menuNews">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuNews"
                      d="M3 4V18C3 18.5304 3.21071 19.0391 3.58579 19.4142C3.96086 19.7893 4.46957 20 5 20H19C19.5304 20 20.0391 19.7893 20.4142 19.4142C20.7893 19.0391 21 18.5304 21 18V8H17"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path id="iconMenuNews2"
                      d="M3 4H17V18C17 18.5304 17.2107 19.0391 17.5858 19.4142C17.9609 19.7893 18.4696 20 19 20M13 8H7M13 12H9"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuNews" onclick="location.href='../../admin/news/index.html'">News</button>
                </div>
                <div class="sidebar-menu-box" id="menuSources">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuSources"
                      d="M7 9H17V7H7V9ZM7 13H11.75C12.0833 12.6 12.446 12.2293 12.838 11.888C13.23 11.5467 13.659 11.2507 14.125 11H7V13ZM7 17H10.05C10.0833 16.65 10.146 16.3083 10.238 15.975C10.33 15.6417 10.4423 15.3167 10.575 15H7V17ZM5 21C4.45 21 3.97933 20.8043 3.588 20.413C3.19667 20.0217 3.00067 19.5507 3 19V5C3 4.45 3.196 3.97933 3.588 3.588C3.98 3.19667 4.45067 3.00067 5 3H19C19.55 3 20.021 3.196 20.413 3.588C20.805 3.98 21.0007 4.45067 21 5V10.575C20.6833 10.4417 20.3583 10.3293 20.025 10.238C19.6917 10.1467 19.35 10.084 19 10.05V5H5V19H10.05C10.0833 19.35 10.146 19.6917 10.238 20.025C10.33 20.3583 10.4423 20.6833 10.575 21H5ZM18 23C16.7833 23 15.721 22.621 14.813 21.863C13.905 21.105 13.334 20.1507 13.1 19H14.65C14.8667 19.7333 15.2793 20.3333 15.888 20.8C16.4967 21.2667 17.2007 21.5 18 21.5C18.9667 21.5 19.7917 21.1583 20.475 20.475C21.1583 19.7917 21.5 18.9667 21.5 18C21.5 17.0333 21.1583 16.2083 20.475 15.525C19.7917 14.8417 18.9667 14.5 18 14.5C17.5167 14.5 17.0667 14.5877 16.65 14.763C16.2333 14.9383 15.8667 15.184 15.55 15.5H17V17H13V13H14.5V14.425C14.95 13.9917 15.475 13.646 16.075 13.388C16.675 13.13 17.3167 13.0007 18 13C19.3833 13 20.5627 13.4877 21.538 14.463C22.5133 15.4383 23.0007 16.6173 23 18C22.9993 19.3827 22.5117 20.562 21.537 21.538C20.5623 22.514 19.3833 23.0013 18 23Z"
                      fill="#1B1357"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuSources" onclick="location.href='../../admin/newssources/index.html'">Sources</button>
                </div>
                <div class="sidebar-menu-box" id="menuAbout">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuAbout"
                      d="M4 4.00098H20V18.001C20 18.5314 19.7893 19.0401 19.4142 19.4152C19.0391 19.7903 18.5304 20.001 18 20.001H6C5.46957 20.001 4.96086 19.7903 4.58579 19.4152C4.21071 19.0401 4 18.5314 4 18.001V4.00098Z"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path id="iconMenuAbout2"
                      d="M12 8H12.01V8.01H12V8Z"
                      stroke="#1B1357"
                      stroke-width="3"
                      stroke-linejoin="round"
                    />
                    <path id="iconMenuAbout3"
                      d="M12 12V16"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuAbout" onclick="location.href='../../admin/about/index.html'">About</button>
                </div>
                <div class="sidebar-menu-box" id="menuUsers">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuUsers"
                      d="M9 13C11.2091 13 13 11.2091 13 9C13 6.79086 11.2091 5 9 5C6.79086 5 5 6.79086 5 9C5 11.2091 6.79086 13 9 13Z"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path id="iconMenuUsers2"
                      d="M16 19C16 15.686 12.866 13 9 13C5.134 13 2 15.686 2 19M15 13C15.6684 13 16.3261 12.8324 16.9131 12.5127C17.5 12.193 17.9975 11.7313 18.3601 11.1698C18.7227 10.6083 18.9388 9.96494 18.9886 9.29841C19.0385 8.63189 18.9205 7.9635 18.6456 7.3543C18.3706 6.7451 17.9473 6.21453 17.4144 5.81105C16.8816 5.40757 16.2561 5.14404 15.5952 5.04456C14.9342 4.94507 14.2589 5.01279 13.6309 5.24154C13.0028 5.47028 12.4421 5.85275 12 6.354"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                    <path id="iconMenuUsers3"
                      d="M22 19C22 15.686 18.866 13 15 13C14.193 13 12.897 12.707 12 11.765"
                      stroke="#1B1357"
                      stroke-width="2"
                      stroke-linecap="round"
                      stroke-linejoin="round"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuUsers" onclick="location.href='../../admin/users/index.html'">Users</button>
                </div>
                <div class="sidebar-menu-box" id="menuMessages">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuMessages"
                      d="M4 2H20C21.103 2 22 2.897 22 4V16C22 17.103 21.103 18 20 18H17V21.767L10.723 18H4C2.897 18 2 17.103 2 16V4C2 2.897 2.897 2 4 2ZM4 16H11.277L15 18.233V16H20V4H4V16Z"
                      fill="#1B1357"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuMessages" onclick="location.href='../../admin/mails/index.html'">Messages</button>
                </div>
                <div class="sidebar-menu-box" id="menuExports">
                  <svg
                    class="menu-icon"
                    width="24"
                    height="24"
                    viewBox="0 0 24 24"
                    fill="none"
                    xmlns="http://www.w3.org/2000/svg"
                  >
                    <path id="iconMenuExports" d="M11 16H13V7H16L12 2L8 7H11V16Z" fill="#1B1357" />
                    <path id="iconMenuExports2" 
                      d="M5 22H19C20.103 22 21 21.103 21 20V11C21 9.897 20.103 9 19 9H15V11H19V20H5V11H9V9H5C3.897 9 3 9.897 3 11V20C3 21.103 3.897 22 5 22Z"
                      fill="#1B1357"
                    />
                  </svg>
                  <button class="bth-menu-item" id="btnMenuExports" onclick="location.href='../../admin/orders/index.html'">Exports</button>
                </div>
              </div>
            </div>
            <div class="admin-content">
              <section class="head-block admin">
                <div class="title-block">
                  <div class="title-box">
                    <p class="title">Create News</p>
                  </div>
                </div>
              </section>
              <form action="#" class="form-input admin">
                <div class="input-box first admin">
                  <label for="category" class="input-lable">Category</label>
                  <select class="input-text" name="category" id="" >
                    <option value=""> - - - </option>
                    <option value="sport">Sport</option>
                    <option value="politics">Politics</option>
                    <option value="ecology">Ecology</option>
                    <option value="economy">Economy</option>
                    <option value="culture">Culture</option>
                    <option value="technology">Technology</option>
                    <option value="auto">Auto</option>
                    <option value="world">World</option>
                    <option value="science">Science</option>
                    <option value="nature">Nature</option>
                  </select>            
                </div>
                <div class="input-box" name="title-box">
                  <label for="title" class="input-lable">Title</label>            
                  <input type="text" class="input-text" name="title">              
                </div>
                <div class="input-box" name="source-box">
                    <label for="source" class="input-lable">Source</label>
                    <select class="input-text" name="source" id="">
                        <option value=""> - - - </option>
                        <option value="1">Supervisor Fire Fighting Worker</option>
                        <option value="2">Supervisor Correctional Officer</option>
                        <option value="3">Admin</option>
                        <option value="4">Door To Door Sales</option>
                        <option value="5">Legal Secretary</option>
                        <option value="6">Plate Finisher</option>
                        <option value="7">Garment</option>
                        <option value="8">Radiation Therapist</option>
                        <option value="9">Dental Laboratory Technician</option>
                        <option value="10">Airfield Operations Specialist</option>
                    </select>  
                </div>
                <div class="input-box" name="author-box">
                    <label for="author" class="input-lable">Author</label>            
                    <input type="text" class="input-text" name="author">              
                </div>
                <div class="input-box" name="description-box">
                  <label for="description" class="input-lable">Description</label>
                  <textarea class="input-text area" name="description" id=""></textarea>            
                </div>                
                <div class="input-box" name="image-box">
                    <div class="input-group">
                        <div class="input-box half" name="image-box">
                            <label for="image" class="input-lable">Image</label>            
                            <input type="file" class="input-text file" name="image" accept="image/*" multiple >
                        </div>
                        <div class="input-box mini" name="status-box">
                            <label for="status" class="input-lable">Status</label>            
                            <select class="input-text" name="status" id="">
                                <option value="draft">DRAFT</option>
                                <option value="active">ACTIVE</option>
                                <option value="blocked">BLOCKED</option>
                            </select>              
                        </div> 
                    </div>
                </div>
                <div class="input-box" name="btns-box">
                    <div class="input-group">
                        <button class="btn-form">Save & close</button>    
                        <button class="btn-form cancel">Cancel</button>                    
                    </div>

                </div> 
              </form>
            </div>  
          </div>
        </main>
      </div>
      <footer>
        <div class="footer-block">
          <div class="footer-sidebar-box"></div>
          <div class="footer-services-box"></div>
        </div>
      </footer>
    </div>
  </body>
</html>
