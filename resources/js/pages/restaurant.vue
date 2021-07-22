<template>
<div>
                            <b-skeleton-wrapper :loading="loading" height="100vh">
      <template #loading>
  <div class="d-flex justify-content-center mb-3" style="height: 100vh !important;">
  </div>
    </template>
    <top-nav />
        <section class="au-breadcrumb2 d-block" >
            <div>
        <div class="card card-body bg-danger text-justify py-2" v-if="toggle == 1">
            <h6 class="text-white">Sorry, we are currently closed at the moment.</h6>
            <p class="text-white">Note: Our services starts by 9:00a.m daily</p>
        </div>
  <v-carousel
    cycle
    height="250"
    hide-delimiter-background
    show-arrows-on-hover
  >
    <v-carousel-item
      v-for="(slide, i) in slides"
      :key="i"
    >
      <v-sheet
        height="100%"
      >
        <v-row
          class="fill-height"
          align="center"
          justify="center"
        >
        <v-img src="/images/IMG_6780-01.jpeg">

        </v-img>
          <!-- <div class="display-3">
            {{ slide }} Slide
          </div> -->
        </v-row>
      </v-sheet>
    </v-carousel-item>
  </v-carousel>        
                <div class="container-fluid mt-2">
                    <b-input-group>
                        <b-input-group-prepend>
                            <b-input-group-text>
                                <b-icon-search></b-icon-search>
                            </b-input-group-text>
                        </b-input-group-prepend>
                        
                        <b-form-input disabled type="text" placeholder="What are you craving for?"></b-form-input>
                    </b-input-group>
                </div>
            </div>
            <div >
      <v-card
      style="overflow-x: auto;"
      flat
      >
    <b-button-group class="mt-2 col-12">
        <b-button class="col" size="sm"  variant="light">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="35" height="35" x="0" y="0" viewBox="0 0 64 64" style="enable-background:new 0 0 512 512" xml:space="preserve" class=""><g><g xmlns="http://www.w3.org/2000/svg" id="Flat"><g id="Stroke_copy_2" data-name="Stroke copy 2"><g><g><path d="m26 18.664h-4v-8a2 2 0 0 1 .891-1.664l9-6 2.218 3.328-8.109 5.406z" fill="#f9e109" data-original="#f9e109" style=""/><path d="m34.11 6.33-8.11 5.4v6.93h-4v-8a1.994 1.994 0 0 1 .89-1.66l1.01-.68a5.35 5.35 0 0 0 4.82-.75l4.19-3.05z" fill="#fcbc04" data-original="#fcbc04" style=""/><path d="m35 61h-22l-4-35h30z" fill="#f8664f" data-original="#f8664f" style=""/>
                <path d="m11 22h26a2 2 0 0 1 2 2v2a0 0 0 0 1 0 0h-30a0 0 0 0 1 0 0v-2a2 2 0 0 1 2-2z" fill="#31d156" data-original="#84d2f4" style="" class=""/><path d="m16 18h16a2 2 0 0 1 2 2v2a0 0 0 0 1 0 0h-20a0 0 0 0 1 0 0v-2a2 2 0 0 1 2-2z" fill="#31d156" data-original="#84d2f4" style="" class=""/><path d="m38.66 29h-22.66a34.147 34.147 0 0 0 21.53 9.9l-2.53 22.1h-22l-4-35h30z" fill="#cc5144" data-original="#cc5144" style="" class=""/><g fill="#57b7eb"><path d="m39 24v2h-30v-2a2.006 2.006 0 0 1 2-2 2.006 2.006 0 0 0 2 2z" fill="#28a745" data-original="#57b7eb" style="" class=""/><path d="m34 20v2h-20v-2a2.006 2.006 0 0 1 2-2 2.006 2.006 0 0 0 2 2z" fill="#28a745" data-original="#57b7eb" style="" class=""/>
                </g>
                </g>
                <g>
                    <path d="m45 23-2 25-1 11 5 1 3-36-3-1.6z" fill="#e59730" data-original="#e59730" style=""/>
                    <path d="m39 28 2 24h6l-2-25-3-3z" fill="#fcbc04" data-original="#fcbc04" style=""/>
                    <path d="m47 52h-6l-2-24 1.18-1.57 1.82 14.57h1l1.09-6.36.91-.64.61.61z" fill="#e59730" data-original="#e59730" style=""/><path d="m37 31-2.963-1.018-1.037 3.018 5 16 4.667-2z" fill="#f9e109" data-original="#f9e109" style=""/>
                    <path d="m42.67 47-4.67 2-5-16 1.02-2.95 1.83 5.5a17.733 17.733 0 0 0 5.66 8.18z" fill="#fcbc04" data-original="#fcbc04" style=""/><path d="m55 24-4.079 19h4.079l3-14z" fill="#f9e109" data-original="#f9e109" style=""/><path d="m54.848 33.325 1.6-6.918-1.448-2.407-4.079 19h4.079l1.363-6.359a3 3 0 0 1 -1.515-3.316z" fill="#fcbc04" data-original="#fcbc04" style=""/><path d="m27 30 7 19 4-1-7-18z" fill="#f9e109" data-original="#f9e109" style=""/><path d="m27 30 7 19 2-.5-7.142-18.5z" fill="#fcbc04" data-original="#fcbc04" style=""/>
                    <path d="m49 27-3 24 4-1 4-21z" fill="#f9e109" data-original="#f9e109" style=""/><path d="m51.72 40.97-1.72 9.03-4 1 3-24 1.94.78-.8 11.23a1.856 1.856 0 0 0 1.58 1.96z" fill="#fcbc04" data-original="#fcbc04" style=""/><path d="m48 52h-4l1-18 4 1z" fill="#f9e109" data-original="#f9e109" style=""/><path d="m46.732 42.567.226-8.077-1.958-.49-1 18h4l.393-6.674a3 3 0 0 1 -1.661-2.759z" fill="#fcbc04" data-original="#fcbc04" style=""/><path d="m53 39c0 3.866-4.029 7-9 7s-9-3.134-9-7h-5l3 22h22l3-22z" fill="#31d156" data-original="#84d2f4" style="" class=""/><path d="m55.55 57-.55 4h-22l-3-22h5a6.112 6.112 0 0 0 2.07 4.46 15.991 15.991 0 0 0 15.81 13.54z" fill="#28a745" data-original="#57b7eb" style="" class=""/><circle cx="44" cy="54" fill="#f9e109" r="3" data-original="#f9e109" style=""/><path d="m46.49 55.67a3 3 0 0 1 -5.49-1.67 2.947 2.947 0 0 1 .54-1.71 15.951 15.951 0 0 0 4.95 3.38z" fill="#fcbc04" data-original="#fcbc04" style=""/></g><g><path d="m30 51h-18a4 4 0 0 1 -4-4 4 4 0 0 1 4-4h18a4 4 0 0 1 4 4 4 4 0 0 1 -4 4z" fill="#f89c8d" data-original="#f89c8d" style=""/><path d="m32 49a3.931 3.931 0 0 0 1.64-.36 3.865 3.865 0 0 1 -.81 1.19 4.025 4.025 0 0 1 -2.83 1.17h-18a4 4 0 0 1 -2.83-6.83 3.865 3.865 0 0 1 1.19-.81 3.931 3.931 0 0 1 1.64-.36h18a4 4 0 0 1 2.64 1 3.833 3.833 0 0 1 1.1 1.6 2.116 2.116 0 0 1 -1.85 1.09 2.163 2.163 0 0 1 -.95-.22 2.076 2.076 0 0 0 -1.88 0l-2.12 1.06a2.076 2.076 0 0 1 -1.88 0l-2.12-1.06a2.076 2.076 0 0 0 -1.88 0l-2.12 1.06a2.076 2.076 0 0 1 -1.88 0l-2.12-1.06a2.076 2.076 0 0 0 -1.88 0l-1.61.81a3.1 3.1 0 0 1 -.58.21 3.984 3.984 0 0 0 3.13 1.51z" fill="#f8664f" data-original="#f8664f" style=""/><path d="m6 55h30a0 0 0 0 1 0 0v2a4 4 0 0 1 -4 4h-22a4 4 0 0 1 -4-4v-2a0 0 0 0 1 0 0z" fill="#fcbc04" data-original="#fcbc04" style=""/><path d="m23.8 55-.8 1-.8-1z" fill="#e59730" data-original="#e59730" style=""/><path d="m23.8 55-.8 1-.8-1z" fill="#e59730" data-original="#e59730" style=""/><path d="m32 55h-22a2 2 0 0 1 -2-2 2 2 0 0 1 2-2h22a2 2 0 0 1 2 2 2 2 0 0 1 -2 2z" fill="#cc5144" data-original="#cc5144" style="" class=""/><path d="m24 56-4-5h8z" fill="#f7f754" data-original="#f7f754" style=""/><path d="m23.657 52.072-.857-1.072h-2.8l4 5 2.265-2.831a2.974 2.974 0 0 1 -2.608-1.097z" fill="#f9e109" data-original="#f9e109" style=""/><path d="m7 43a3.234 3.234 0 0 0 1.789 2.894l.764.382a3.232 3.232 0 0 0 2.894 0l1.609-.8a2.112 2.112 0 0 1 1.888 0l2.112 1.056a2.112 2.112 0 0 0 1.888 0l2.112-1.056a2.112 2.112 0 0 1 1.888 0l2.112 1.056a2.112 2.112 0 0 0 1.888 0l2.112-1.056a2.112 2.112 0 0 1 1.888 0 2.112 2.112 0 0 0 3.056-1.892v-.584z" fill="#c4f236" data-original="#c4f236" style="" class=""/><path d="m26 33h-10a10 10 0 0 0 -10 10h30a10 10 0 0 0 -10-10z" fill="#fcbc04" data-original="#fcbc04" style=""/><path d="m36 43h-30a10 10 0 0 1 7.32-9.63 9 9 0 0 0 8.68 6.63h13.54a9.908 9.908 0 0 1 .46 3z" fill="#e59730" data-original="#e59730" style=""/><path d="m36 57a4 4 0 0 1 -4 4h-22a4 4 0 0 1 -4-4v-2h2.13a3.992 3.992 0 0 0 3.87 3h21a4.941 4.941 0 0 0 3-1z" fill="#e59730" data-original="#e59730" style=""/><path d="m35 43v.58a1.424 1.424 0 0 1 -.05.42h-26.25a3.058 3.058 0 0 0 1.09.89l.76.39a3.284 3.284 0 0 0 2.9 0l1.61-.81a2.076 2.076 0 0 1 1.88 0l2.12 1.06a2.076 2.076 0 0 0 1.88 0l2.12-1.06a2.076 2.076 0 0 1 1.88 0l2.12 1.06a2.076 2.076 0 0 0 1.88 0l2.12-1.06a2.076 2.076 0 0 1 1.88 0 2.1 2.1 0 0 0 1.86.01 2.119 2.119 0 0 1 -1.91 1.21 2.163 2.163 0 0 1 -.95-.22 2.076 2.076 0 0 0 -1.88 0l-2.12 1.06a2.076 2.076 0 0 1 -1.88 0l-2.12-1.06a2.076 2.076 0 0 0 -1.88 0l-2.12 1.06a2.076 2.076 0 0 1 -1.88 0l-2.12-1.06a2.076 2.076 0 0 0 -1.88 0l-1.61.81a3.284 3.284 0 0 1 -2.9 0l-.76-.39a3.21 3.21 0 0 1 -1.79-2.89z" fill="#a1d51c" data-original="#a1d51c" style="" class=""/><g><g fill="#f9e109"><circle cx="23" cy="37" r="1" fill="#f9e109" data-original="#f9e109" style=""/><circle cx="19" cy="36" r="1" fill="#f9e109" data-original="#f9e109" style=""/><circle cx="16" cy="38" r="1" fill="#f9e109" data-original="#f9e109" style=""/><circle cx="31" cy="38" r="1" fill="#f9e109" data-original="#f9e109" style=""/></g><circle cx="12" cy="37" fill="#fcbc04" r="1" data-original="#fcbc04" style=""/><circle cx="27" cy="36" fill="#f9e109" r="1" data-original="#f9e109" style=""/></g><path d="m16.91 38.42a1 1 0 0 1 -1.91-.42 1.022 1.022 0 0 1 .44-.83h.01a8.693 8.693 0 0 0 1.46 1.25z" fill="#fcbc04" data-original="#fcbc04" style=""/></g></g></g></g></g></svg>
            </span>
            <h6 class="text-uppercase small text-success font-weight-bold">Restaurants</h6>
        </b-button>
        <b-button class="col" to="/mart" size="sm" variant="white">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="40" height="40" x="0" y="0" viewBox="0 0 490.674 490.674" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                <g>
                <g xmlns="http://www.w3.org/2000/svg">
                    <circle style="" cx="394.667" cy="426.671" r="53.333" fill="#455a64" data-original="#455a64"/>
                    <circle style="" cx="181.333" cy="426.671" r="53.333" fill="#455a64" data-original="#455a64"/>
                </g>
                <path xmlns="http://www.w3.org/2000/svg" style="" d="M488,78.276c-2.026-2.294-4.94-3.607-8-3.605H96c-5.891-0.001-10.668,4.773-10.669,10.664  c0,0.717,0.072,1.433,0.216,2.136l42.667,213.333c1.014,4.967,5.384,8.534,10.453,8.533c0.469,0.031,0.939,0.031,1.408,0l320-42.667  c4.807-0.642,8.576-4.446,9.173-9.259l21.333-170.667C490.989,83.681,490.047,80.592,488,78.276z" fill="#42ba96" data-original="#ffc107" class=""/>
                <g xmlns="http://www.w3.org/2000/svg">
                    <path style="" d="M181.333,266.671c-5.214-0.002-9.662-3.774-10.517-8.917l-21.333-128   c-0.791-5.838,3.3-11.211,9.138-12.002c5.59-0.758,10.804,2.969,11.897,8.504l21.333,128c0.963,5.808-2.961,11.298-8.768,12.267   C182.505,266.622,181.92,266.672,181.333,266.671z" fill="#fafafa" data-original="#fafafa"/>
                    <path style="" d="M234.667,256.004c-5.536,0.022-10.169-4.193-10.667-9.707l-10.667-117.333   c-0.552-5.865,3.755-11.067,9.621-11.619c0.029-0.003,0.057-0.005,0.086-0.008c5.867-0.531,11.053,3.796,11.584,9.663   c0,0,0,0.001,0,0.001l10.667,117.333c0.53,5.867-3.796,11.053-9.663,11.584c0,0-0.001,0-0.001,0L234.667,256.004z" fill="#fafafa" data-original="#fafafa"/>
                    <path style="" d="M288,245.337c-5.891,0-10.667-4.776-10.667-10.667V128.004c0-5.891,4.776-10.667,10.667-10.667   c5.891,0,10.667,4.776,10.667,10.667v106.667C298.667,240.562,293.891,245.337,288,245.337z" fill="#fafafa" data-original="#fafafa"/>
                    <path style="" d="M341.333,234.671h-1.195c-5.858-0.62-10.104-5.872-9.484-11.731   c0.004-0.036,0.008-0.073,0.012-0.109l10.667-96c0.692-5.867,5.963-10.093,11.84-9.493c5.855,0.648,10.077,5.919,9.43,11.775   c0,0,0,0.001,0,0.001l-10.667,96C351.368,230.543,346.793,234.667,341.333,234.671z" fill="#fafafa" data-original="#fafafa"/>
                    <path style="" d="M394.667,224.004c-5.891-0.002-10.665-4.779-10.664-10.67c0-0.869,0.107-1.735,0.317-2.578   l21.333-85.333c1.293-5.747,7.001-9.358,12.748-8.065c5.747,1.293,9.358,7.001,8.065,12.748c-0.036,0.161-0.076,0.321-0.12,0.48   l-21.333,85.333C403.829,220.669,399.562,224.003,394.667,224.004z" fill="#fafafa" data-original="#fafafa"/>
                </g>
                <path xmlns="http://www.w3.org/2000/svg" style="" d="M437.333,352.004H191.125c-35.558-0.082-66.155-25.16-73.216-60.011L65.92,32.004H10.667  C4.776,32.004,0,27.228,0,21.337s4.776-10.667,10.667-10.667h64c5.07-0.001,9.439,3.566,10.453,8.533l53.717,268.587  c5.035,24.896,26.888,42.817,52.288,42.88h246.208c5.891,0,10.667,4.776,10.667,10.667C448,347.228,443.224,352.004,437.333,352.004  z" fill="#455a64" data-original="#455a64"/>
                </g>
                </svg>
            </span>
        <h6 class="text-uppercase small text-success font-weight-bold">mart</h6>
            
        </b-button>
        <b-button class="col" to="/specials" size="sm" variant="white">
            <span>
                <svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" xmlns:svgjs="http://svgjs.com/svgjs" version="1.1" width="40" height="40" x="0" y="0" viewBox="0 0 512 512" style="enable-background:new 0 0 512 512" xml:space="preserve" class="">
                <g>
                <g xmlns="http://www.w3.org/2000/svg">
                    <path style="" d="M351.335,512c-0.502,0-1.007-0.025-1.512-0.076c-4.798-0.486-9.068-3.248-11.479-7.424   L228.198,313.723c-4.142-7.175-1.684-16.349,5.49-20.49l105.418-60.863c3.445-1.989,7.538-2.527,11.382-1.499   c3.843,1.03,7.119,3.544,9.108,6.989l110.146,190.777c2.411,4.176,2.667,9.256,0.689,13.653s-5.949,7.576-10.673,8.542   l-57.956,11.857l-39.245,44.262C359.695,510.18,355.601,512,351.335,512z" fill="#339779" data-original="#a50043" class=""/>
                    <path style="" d="M160.664,512c-4.266,0-8.36-1.82-11.222-5.049l-39.246-44.262l-57.955-11.857   c-4.724-0.966-8.695-4.145-10.673-8.542s-1.722-9.478,0.689-13.653l110.145-190.777c1.989-3.445,5.265-5.959,9.108-6.989   c3.843-1.029,7.937-0.49,11.382,1.499l105.418,60.863c7.175,4.142,9.633,13.315,5.49,20.49L173.656,504.5   c-2.411,4.176-6.682,6.938-11.479,7.424C161.672,511.975,161.167,512,160.664,512z" fill="#42ba96" data-original="#f90053" class=""/>
                    <path style="" d="M256.442,387.397c-0.225,0-0.448-0.002-0.674-0.006c-19.604-0.304-33.428-12.839-45.625-23.897   c-7.13-6.465-13.864-12.571-20.668-15.39c-6.052-2.507-14.485-2.729-23.414-2.965c-15.869-0.418-33.856-0.893-47.188-14.643   c-13.647-14.077-14.559-32.716-15.363-49.16c-0.47-9.613-0.914-18.692-3.732-25.497c-2.507-6.052-8.313-12.172-14.459-18.651   c-10.926-11.518-23.31-24.571-23.013-43.723c0.304-19.604,12.839-33.428,23.898-45.624c6.465-7.129,12.572-13.863,15.391-20.668   c2.506-6.052,2.729-14.484,2.964-23.413c0.418-15.87,0.893-33.856,14.644-47.188c14.078-13.647,32.715-14.559,49.16-15.362   c9.613-0.47,18.692-0.914,25.497-3.732c6.051-2.506,12.171-8.313,18.651-14.459C223.892,12.221,236.776,0,255.559,0   c0.224,0,0.447,0.001,0.673,0.005c0,0,0,0,0,0c19.604,0.304,33.428,12.839,45.623,23.898c7.13,6.465,13.864,12.571,20.669,15.39   c6.052,2.507,14.485,2.729,23.414,2.965c15.869,0.418,33.856,0.893,47.188,14.643c13.647,14.078,14.559,32.716,15.363,49.16   c0.47,9.613,0.914,18.692,3.732,25.497c2.506,6.052,8.313,12.172,14.459,18.652c10.926,11.517,23.309,24.57,23.013,43.72   c-0.304,19.605-12.839,33.43-23.898,45.626c-6.465,7.129-12.571,13.863-15.39,20.668c-2.507,6.051-2.729,14.484-2.964,23.412   c-0.418,15.87-0.893,33.857-14.644,47.189c-14.077,13.647-32.716,14.559-49.16,15.362c-9.612,0.47-18.692,0.914-25.497,3.732   c-6.051,2.507-12.171,8.313-18.651,14.459C288.109,375.176,275.224,387.397,256.442,387.397z" fill="#ffef31" data-original="#ffef31"/>
                    <path style="" d="M426.681,150.21c-6.146-6.48-11.953-12.601-14.459-18.652c-2.818-6.805-3.263-15.884-3.732-25.497   c-0.805-16.444-1.716-35.082-15.363-49.16c-13.331-13.75-31.318-14.225-47.188-14.643c-8.929-0.235-17.362-0.458-23.414-2.965   c-6.805-2.818-13.539-8.925-20.669-15.39c-12.195-11.06-26.019-23.595-45.623-23.898c0,0,0,0,0,0   c-0.078-0.001-0.155-0.001-0.232-0.002v387.39c0.147,0.002,0.295,0.004,0.442,0.004c18.782,0,31.667-12.222,43.047-23.019   c6.48-6.146,12.601-11.952,18.651-14.459c6.805-2.818,15.885-3.263,25.497-3.732c16.444-0.804,35.083-1.715,49.16-15.362   c13.751-13.332,14.226-31.319,14.644-47.189c0.235-8.928,0.457-17.361,2.964-23.412c2.818-6.805,8.925-13.539,15.39-20.668   c11.06-12.196,23.595-26.021,23.898-45.626C449.99,174.78,437.607,161.727,426.681,150.21z" fill="#ead000" data-original="#ead000"/>
                    <path style="" d="M256,317.397c-68.208,0-123.699-55.491-123.699-123.698C132.301,125.491,187.792,70,256,70   s123.699,55.491,123.699,123.699C379.699,261.906,324.208,317.397,256,317.397z" fill="#ffcd00" data-original="#ffcd00"/>
                    <path style="" d="M256,70L256,70l0,247.397h0c68.208,0,123.699-55.491,123.699-123.698   C379.699,125.491,324.208,70,256,70z" fill="#ebb100" data-original="#ebb100"/>
                    <path style="" d="M220.536,261.272c-3.048,0-6.063-0.929-8.617-2.722c-3.83-2.688-6.187-7.009-6.372-11.685   l-1.368-34.527l-17.756-24.788c-2.725-3.805-3.519-8.662-2.146-13.136c1.373-4.473,4.754-8.05,9.144-9.671l32.415-11.971   l18.088-24.547c2.776-3.767,7.151-6.022,11.829-6.1c4.672-0.084,9.125,2.034,12.023,5.708l21.402,27.129l28.936,9.617   c4.44,1.476,7.938,4.939,9.456,9.365c1.52,4.426,0.886,9.308-1.713,13.198l-19.188,28.739l-0.205,30.489   c-0.032,4.68-2.245,9.076-5.985,11.888c-3.739,2.813-8.578,3.719-13.081,2.45l-33.261-9.368   C254.136,251.343,225.591,261.273,220.536,261.272z" fill="#fffac1" data-original="#fffac1"/>
                    <path style="" d="M327.571,173.946c-1.519-4.426-5.016-7.89-9.456-9.365l-28.936-9.617l-21.402-27.129   c-2.846-3.609-7.195-5.704-11.777-5.698v129.731l31.398,8.843c4.503,1.269,9.342,0.362,13.081-2.45   c3.74-2.812,5.953-7.208,5.985-11.888l0.205-30.489l19.189-28.739C328.456,183.254,329.09,178.372,327.571,173.946z" fill="#ffef31" data-original="#ffef31"/>
                </g>
                </g>
                </svg>
                    <sup class="badge badge-danger">new</sup>
            </span>

            <h6 class="text-uppercase small text-success font-weight-bold">Specials</h6>
            
        </b-button>
        <b-button class="col" to="/services" size="sm" variant="white">
            <span class="zmdi zmdi-car-taxi zmdi-hc-3x text-success"></span>
            <h6 class="text-uppercase small text-success font-weight-bold">Services</h6>
            
        </b-button>
        <!-- <b-button class="col" to="/more" size="sm" variant="white">
            <span class="zmdi zmdi-more zmdi-hc-3x text-success"></span>
            <h6 class="text-uppercase small text-success font-weight-bold">More</h6>
            
        </b-button> -->
    </b-button-group>



      </v-card>
                <b-card-group class="pb-10" deck v-if="restaurants != null">
                    <div class="col-md-6" v-for="(restaurant, index) in restaurants" :key="index">
                    <router-link :to="'/restaurant/menu/'+restaurant.slug" tag="a" class="list-group-item">
                    <div class="row row-sm align-items-center">
                      <div class="col-auto">
                        <img :src="'/storage/'+restaurant.image" class="rounded" alt="Image" width="95" height="95">
                      </div>
                      <div class="col h6 text-dark">
                        {{ restaurant.name }}
                        <div class="text-muted border-top mt-2">
                            <div class="small">
                                <b>Nickname:</b>
                                {{ restaurant.nickname }}
                            </div>
                            <div class="small">
                                <b>Timer:</b> 
                                {{ restaurant.timer }} mins
                            </div>
                        </div>
                      </div>
                      <div class="col-auto text-success">
                        <i class="zmdi zmdi-chevron-right zmdi-hc-lg"></i>
                      </div>
                    </div>



                    </router-link>



                    </div>
                </b-card-group>
    
            </div>
        </section>
            
    </b-skeleton-wrapper>
  
</div>

</template>

<script>
import { mapGetters } from 'vuex'
import Cookies from 'js-cookie'
import TopNav from '../components/boo'

    export default {
        layout: 'default',
        components: {
            TopNav,
        },
        data: () => ({
            title: window.config.appName
        }),
        data() {
            return {
                school: JSON.parse(this.$store.getters["school/school"]),
                restaurants: '',
                loading: false,
                loadingTime: 0,
                maxLoadingTime: 3,
                toggle: '',
                slides: [
                'First',
                'Second',
                'Third',
                'Fourth',
                'Fifth',
                ],                
            }
        },

        metaInfo () {
            return { title: this.$t('home') + ' | ' + JSON.parse(this.$store.getters["school/school"]).name }
        },
        computed: mapGetters({
            authenticated: 'auth/check',
            user: 'auth/user'
        }),
        created() {
              sessionStorage.clear();
            if (this.$store.getters["school/school"] == null)
            {
                this.$_loadingTimeInterval = null
                this.$router.push({ name: 'welcome' })
            } else {
            this.findRestaurant();
                this.$_loadingTimeInterval = null
            }

        },
        watch: {
            loading(newVal, oldValue) {
                if (newVal !== oldValue) {
                this.clearLoadingTimeInterval()

                if (newVal) {
                    this.$_loadingTimeInterval = setInterval(() => {
                    this.loadingTime++
                    }, 1000)
                }
                }
            },
            loadingTime(newVal, oldValue) {
                if (newVal !== oldValue) {
                if (newVal === this.maxLoadingTime) {
                    this.loading = false
                }
                }
            }
        },
        methods: {
            findRestaurant() {
                axios.post('/api/cafetarias/'+ this.school.slug)
                    .then((response)=>{
                        this.restaurants = response.data.cafetarias;
                        this.toggle = response.data.toggle.toggle;
                    }).catch(err => {
                        // alert('Please Reload');
                        // location.reload();

                    });
            },
            clearLoadingTimeInterval() {
                clearInterval(this.$_loadingTimeInterval)
                this.$_loadingTimeInterval = null
            },
            startLoading() {
                this.loading = true
                this.loadingTime = 0
            }


        },
        mounted() {
            this.startLoading()
            
        }
    }
</script>
<style>
.iconer:before{
    font-size: 30px;
}
/* [class^="flaticon-"]:before, [class*=" flaticon-"]:before, [class^="flaticon-"]:after, [class*=" flaticon-"]:after {

font-size: 26px;

} */
.zmdi-car-taxi, .zmdi-more {
    font-size: 39px;
}
</style>