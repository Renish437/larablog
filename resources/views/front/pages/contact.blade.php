<x-front-layout title="Contact">
<body class="bg-gray font-inter text-body">

    <section class="py-12 lg:py-16">
        <div class="container mx-auto px-4 sm:px-6 lg:px-8 max-w-[1170px]">
            <div class="text-center mb-10 lg:mb-12">
                <h1 class="text-heading-3 sm:text-heading-2 text-dark font-semibold mb-3">Get in Touch</h1>
                <p class="text-custom-lg text-dark-4 max-w-xl mx-auto">
                    Have a question, a suggestion, or just want to say hello? Fill out the form below and we'll get back to you as soon as possible.
                </p>
            </div>

            <form action="#" method="POST" class="bg-white p-6 sm:p-8 lg:p-10 rounded-xl shadow-box-2">
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-6 mb-6">
                    <div>
                        <label for="firstName" class="block text-custom-sm font-medium text-dark mb-2">First Name</label>
                        <input type="text" name="firstName" id="firstName" required
                               class="w-full rounded-md border border-gray-3 p-4 text-body   placeholder:text-dark-3 transition-all duration-200"
                               placeholder="John">
                    </div>
                    <div>
                        <label for="lastName" class="block text-custom-sm font-medium text-dark mb-2">Last Name</label>
                        <input type="text" name="lastName" id="lastName" required
                               class="w-full rounded-md border border-gray-3 p-4 text-body  placeholder:text-dark-3 transition-all duration-200"
                               placeholder="Doe">
                    </div>
                </div>

                <div class="mb-6">
                    <label for="email" class="block text-custom-sm font-medium text-dark mb-2">Email Address</label>
                    <input type="email" name="email" id="email" required
                           class="w-full rounded-md border border-gray-3 p-4 text-body  placeholder:text-dark-3 transition-all duration-200"
                           placeholder="you@example.com">
                </div>

                <div class="mb-6">
                    <label for="subject" class="block text-custom-sm font-medium text-dark mb-2">Subject</label>
                    <input type="text" name="subject" id="subject"
                           class="w-full rounded-md border border-gray-3 p-4 text-body  placeholder:text-dark-3 transition-all duration-200"
                           placeholder="Regarding your latest post on...">
                </div>

                <div class="mb-6">
                    <label for="message" class="block text-custom-sm font-medium text-dark mb-2">Message</label>
                    <textarea name="message" id="message" rows="5" required
                              class="w-full rounded-md border border-gray-3 p-4 text-body  placeholder:text-dark-3 transition-all duration-200 resize-none"
                              placeholder="Your message here..."></textarea>
                </div>

                <div class="mb-8">
                    <div class="flex items-center">
                        <input type="checkbox" name="supportCheckbox" id="supportCheckbox" class="sr-only">
                        <!-- The label is crucial for the custom checkbox styling -->
                        <label for="supportCheckbox" class="flex items-center cursor-pointer select-none">
                            <div class="relative w-5 h-5 border-2 border-gray-4 rounded-sm mr-3 flex-shrink-0 flex items-center justify-center transition-all duration-200 group-hover:border-primary">
                                <!-- This span's opacity is controlled by the CSS: #supportCheckbox:checked ~ div span -->
                                <span class="absolute text-primary opacity-0 transition-opacity">
                                    <svg class="w-3.5 h-3.5 fill-current" viewBox="0 0 16 16" xmlns="http://www.w3.org/2000/svg">
                                        <path d="M13.5097 3.86189L14.6199 4.9039L6.01902 13.5048L1.38014 8.86589L2.49032 7.82388L6.01902 11.3526L13.5097 3.86189Z"/>
                                    </svg>
                                </span>
                            </div>
                            <span class="text-custom-xs text-body">
                                I agree to the <a href="#" class="text-primary hover:underline">Privacy Policy</a> and <a href="#" class="text-primary hover:underline">Terms of Service</a>.
                            </span>
                        </label>
                    </div>
                </div>

                <div>
                    <button type="submit"
                            class="w-full sm:w-auto bg-primary text-white font-semibold py-3 px-8 rounded-md hover:bg-dark transition-all duration-300 ease-in-out focus:outline-none focus:ring-2 focus:ring-primary focus:ring-offset-2 focus:ring-offset-white">
                        Send Message
                    </button>
                </div>
            </form>
        </div>
    </section>

  <style>
      #supportCheckbox:checked ~ label div span svg {
            display: block;
        }
  </style>
  
  
   <script>
        const checkbox = document.getElementById('supportCheckbox');
        const checkboxVisual = checkbox.nextElementSibling.querySelector('div'); // The visual box

        checkbox.addEventListener('change', function() {
            if (this.checked) {
                checkboxVisual.classList.remove('border-gray-4');
                checkboxVisual.classList.add('border-primary', 'bg-primary'); // bg-primary to fill the box with color for better checkmark visibility
            } else {
                checkboxVisual.classList.add('border-gray-4');
                checkboxVisual.classList.remove('border-primary', 'bg-primary');
            }
        });
    </script>


</body>
</x-front-layout>