<template>
    <div class="slideshow">
      <div v-for="(slide, index) in slides" :key="index" :class="{ active: index === activeIndex }">
        <h1 class="text-3xl text-purple-600">{{ slide.title }}</h1>
        <br>
        <p class="bg-clip-text text-transparent bg-gradient-to-r from-purple-600 to-gray-600 font-bold tracking-wide text-left uppercase dark:text-gray-400" style="font-size: 16px;"><strong>{{ slide.description }}</strong></p>
        <br>
    <br>
        <a class="text-center px-10 py-4 font-medium leading-5 text-white transition-colors duration-150 bg-gradient-to-r from-purple-600 to-gray-500 bg-transparent border rounded-lg active:bg-purple-600 hover:bg-purple-600 focus:outline-none focus:shadow-outline-purple" style="display: block; margin: 0 auto;" @click="showDetails(index)">{{ slide.buttonText }}</a>
      </div>
      <button class="prev-button" @click="prevSlide"><svg width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

<title/>

<g id="Complete">

<g id="F-Chevron">

<polyline fill="none" id="Left" points="15.5 5 8.5 12 15.5 19" stroke="#9333ea" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>

</g>

</g>

</svg></button>
      <button class="next-button" @click="nextSlide"><svg width="25px" height="25px" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">

<title/>

<g id="Complete">

<g id="F-Chevron">

<polyline fill="none" id="Right" points="8.5 5 15.5 12 8.5 19" stroke="#9333ea" stroke-linecap="round" stroke-linejoin="round" stroke-width="1"/>

</g>

</g>

</svg></button>
    </div>
  </template>

  <script>
  export default {
    data() {
      return {
        slides: [
          {
            title: 'Invest with us',
            description: 'Begin Your Investment Journey',
            buttonText: 'Register',
          },
          {
            title: 'Login',
            description: 'continue Your Investment Journey',
            buttonText: 'Login',
          },
          {
            title: 'Explore',
            description: 'Learn more about investing in government securities',
            buttonText: 'learn',
          },
          // Add more slides as needed
        ],
        activeIndex: 0, // Keep track of the active slide
      };
    },

    mounted() {
      // Start the slideshow when the component is mounted
      this.startSlideshow();
    },

    methods: {
      showDetails(index) {
        if (index === 0) {
          window.location.href = '/register';
        } else if (index === 1) {
          window.location.href = '/login';
        } else if (index === 2) {
          window.location.href = '/learn';
        } else {
          window.location.href = '/lots/';
        }
      },

      startSlideshow() {
        setInterval(() => {
          this.nextSlide();
        }, 10000); // Change slide every 3 seconds (adjust as needed)
      },

      nextSlide() {
        this.activeIndex = (this.activeIndex + 1) % this.slides.length;
      },

      prevSlide() {
        this.activeIndex = (this.activeIndex - 1 + this.slides.length) % this.slides.length;
      },
    },
  };
  </script>

  <style>
  .slideshow {
    display: flex;
    position: relative;
    justify-content: center;
  align-items: center;
  }

  .slideshow > div {
    display: none;
    position: relative;
    justify-content: center;
  align-items: center;
  }

  .slideshow > div.active {
    display: block;
    /* Add CSS transitions or animations to create the slideshow effect */
  }

  .prev-button,
  .next-button {
    position: absolute;
    top: 50%;
    transform: translateY(-50%);
    padding: 8px 16px;
    font-size: 14px;
    border: none;
    outline: none;
    cursor: pointer;
    z-index: 1;
  }

  .prev-button {
    left: 16px;
  }

  .next-button {
    right: 16px;
  }
  </style>
