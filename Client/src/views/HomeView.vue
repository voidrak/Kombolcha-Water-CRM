<script setup>
import GuestLayout from '@/layout/GuestLayout.vue';
import LandingWaterPlant from "/public/images/Stickney_Water_Plant.jpg"
</script>

<template>

  <GuestLayout>
    <div class="2xl:max-w-7xl sm:px-6 md:px-12 lg:px-24 lg:py-24 2xl:px-12 px-4 py-12 mx-auto">
      <div class="2xl:max-w-7xl flex flex-wrap items-center mx-auto">
        <div class="lg:flex-grow lg:w-1/2 lg:pr-24 md:mb-0 flex flex-col items-start mb-16 text-left">
          <h1 class="text-gray-900 md:text-6xl lg:text-8xl mb-8 text-4xl font-extrabold leading-none tracking-tighter">
            Ensure Reliable Water Services for Your City.
          </h1>
          <p class="mb-8 text-base leading-relaxed text-left text-gray-600">
            Kombolcha City Water Supply helping communities with a seamless platform to manage water services
            efficiently and sustainably.
          </p>
        </div>
        <div class="lg:w-5/6 lg:max-w-lg xl:mt-0 w-full mt-12">
          <div class="relative">
            <img :src="LandingWaterPlant" alt="themeptation"
              class="relative z-10 transform rotate-6 shadow-2xl w-[450px]" />
            <div class="absolute -top-10 -left-24 w-full h-full bg-light-blue  transform -rotate-6"></div>
          </div>
        </div>
      </div>
      <div class=" w-full  mt-24">
        <h1 class="text-center font-bold text-5xl  capitalize underline"> <span class="text-light-blue">Message</span>
          from Manager </h1>

        <p class="mt-8 text-justify tracking-wider">Message: It is known that, in the past two decades our region as
          well
          as the
          country as a whole
          has
          recorded a significant economic and social development which has never seen before in our history. his
          achievements assuring that, how far the dimension of our policies and strategies are developmental and the
          directions we follow are appropriate to our situation and objective realities.


          Now by summarizing and organizing the past years experiences the government has prepared the new five years
          Growth and Transformation Plan aiming to enhance the pace of the ongoing economic and social development of
          the country. Following this, the Amhara National Regional State on his part, Prepared the regional five years
          GTP based on the Region’s situation and objectives realities.

          Then the regional state forwarded the plan to all bodies and sectors to take their part. Here, I want to
          notice that, the successes of GTP mean a proud and prestige for all citizens in front of the international
          communities. So every citizen and stakeholders should give their own contribution for its successes.</p>
      </div>
    </div>


  </GuestLayout>


</template>
