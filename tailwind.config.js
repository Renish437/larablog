// tailwind.config.js
const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
  darkMode: 'class', // This enables class-based dark mode
  content: [
    './resources/**/*.blade.php',
    './resources/**/*.js',
    // Add './resources/**/*.vue' if you use Vue components
  ],
  theme: {
    extend: {
      colors: {
        primary: 'var(--color-primary, #625df5)', // Use CSS var with fallback
        white: 'var(--color-white, #ffffff)',
        'body-text': 'var(--color-body, #374151)', // Or 'gray-700'
        'dark-custom': { // Renamed to avoid conflict with Tailwind's dark:
          DEFAULT: 'var(--color-dark, #15171a)',
          '2': 'var(--color-dark-2, #979797)',
          '3': 'var(--color-dark-3, #b4b4bb)',
          '4': 'var(--color-dark-4, #5c6a78)',
          '5': 'var(--color-dark-5, #bbbec9)',
        },
        'gray-custom': { // For your specific gray shades if needed
          DEFAULT: 'var(--color-gray, #f9fafb)', // Tailwind 'gray-50'
          '2': 'var(--color-gray-2, #f3f4f6)', // Tailwind 'gray-100'
          '3': 'var(--color-gray-3, #e5e7eb)', // Tailwind 'gray-200'
          '4': 'var(--color-gray-4, #d1d5db)', // Tailwind 'gray-300'
          '5': 'var(--color-gray-5, #9ca3af)', // Tailwind 'gray-500'
          '7': 'var(--color-gray-7, #374151)', // Tailwind 'gray-700'
        },
        // Add other specific colors from your --color- variables
        'blue-custom': 'var(--color-blue, #2d68f8)',
        'green-custom': {
            DEFAULT: 'var(--color-green, #22ad5c)',
            dark: 'var(--color-green-dark, #1a8245)',
        },
        'purple-custom': {
            DEFAULT: 'var(--color-purple, #8646f4)',
            dark: 'var(--color-purple-dark, #6d28d9)',
        },
        'cyan-custom': {
            DEFAULT: 'var(--color-cyan, #01a9db)',
            dark: 'var(--color-cyan-dark, #0b76b7)',
        },
        'teal-custom': {
            DEFAULT: 'var(--color-teal, #02aaa4)',
            dark: 'var(--color-teal-dark, #06a09b)',
        },
      },
      fontFamily: {
        sans: ['Inter', ...defaultTheme.fontFamily.sans],
        // mono: ['YourMonoFont', ...defaultTheme.fontFamily.mono], // If you use a custom mono font
      },
      fontSize: {
        // Your custom text sizes, mapping them to Tailwind's config
        // Format: 'alias': ['fontSize', { lineHeight: '...' }],
        'heading-1': ['var(--text-heading-1, 60px)', { lineHeight: 'var(--text-heading-1--line-height, 72px)' }],
        'heading-2': ['var(--text-heading-2, 48px)', { lineHeight: 'var(--text-heading-2--line-height, 58px)' }],
        'heading-3': ['var(--text-heading-3, 40px)', { lineHeight: 'var(--text-heading-3--line-height, 48px)' }],
        'heading-4': ['var(--text-heading-4, 30px)', { lineHeight: 'var(--text-heading-4--line-height, 38px)' }],
        'heading-5': ['var(--text-heading-5, 28px)', { lineHeight: 'var(--text-heading-5--line-height, 40px)' }],
        'heading-6': ['var(--text-heading-6, 24px)', { lineHeight: 'var(--text-heading-6--line-height, 30px)' }],
        'custom-2': ['var(--text-custom-2, 42px)', { lineHeight: 'var(--text-custom-2--line-height, 54px)' }],
        'custom-3': ['var(--text-custom-3, 32px)', { lineHeight: 'var(--text-custom-3--line-height, 45px)' }],
        'custom-4': ['var(--text-custom-4, 22px)', { lineHeight: 'var(--text-custom-4--line-height, 30px)' }],
        'custom-xl': ['var(--text-custom-xl, 20px)', { lineHeight: 'var(--text-custom-xl--line-height, 24px)' }],
        'custom-lg': ['var(--text-custom-lg, 18px)', { lineHeight: 'var(--text-custom-lg--line-height, 24px)' }],
        'custom-sm': ['var(--text-custom-sm, 14px)', { lineHeight: 'var(--text-custom-sm--line-height, 22px)' }], // Equivalent to Tailwind 'sm'
        'custom-xs': ['var(--text-custom-xs, 12px)', { lineHeight: 'var(--text-custom-xs--line-height, 20px)' }], // Equivalent to Tailwind 'xs'
        'custom-4xl': ['var(--text-custom-4xl, 36px)', { lineHeight: 'var(--text-custom-4xl--line-height, 42px)' }], // Equivalent to Tailwind '4xl'
      },
      spacing: {
        // Your custom spacing values if not covered by Tailwind's default 0.25rem scale.
        // Example: if --spacing is 0.25rem (4px)
        // '2.5': '0.625rem', // 10px (Tailwind has this as 2.5)
        // '3.5': '0.875rem', // 14px (Tailwind has this as 3.5)
        // Many of your `calc(var(--spacing) * X)` will map directly to Tailwind's scale.
        // Add any unique ones:
        '7.5': '1.875rem',  // 30px
        '12.5': '3.125rem', // 50px
        '17.5': '4.375rem', // 70px
        // ... etc. Consider using arbitrary values `p-[calc(var(--spacing)*X)]` if these are not frequent
      },
      borderRadius: {
        'xs': 'var(--radius-xs, 0.125rem)',
        // 'sm': defaultTheme.borderRadius.sm, (0.125rem)
        'md': 'var(--radius-md, 0.375rem)', // default
        'lg': 'var(--radius-lg, 0.5rem)',   // default
        'xl': 'var(--radius-xl, 0.75rem)',   // default
        '2xl': 'var(--radius-2xl, 1rem)',    // default
        '3xl': 'var(--radius-3xl, 1.5rem)',    // default
        '4px': '4px',
        '10px': '10px',
        '20px': '20px',
        '50px': '50px',
      },
      boxShadow: {
        // Map your custom shadows
        '1': '0px 1px 2px 0px var(--tw-shadow-color, rgba(166, 175, 195, 0.25))',
        '2': '0px 4px 12px 0px var(--tw-shadow-color, rgba(13, 10, 44, 0.08))',
        'box': '0px 8px 30px -8px var(--tw-shadow-color, rgba(13, 10, 44, 0.05)), 0px 1px 5px 0px var(--tw-shadow-color, rgba(0, 0, 0, 0.04))',
        'box-2': '0px 20px 60px 0px var(--tw-shadow-color, rgba(13, 10, 44, 0.15)), 0px 2px 3px 0px var(--tw-shadow-color, rgba(13, 10, 44, 0.12))',
        'img': '0px 13px 40px 0px var(--tw-shadow-color, rgba(13, 10, 44, 0.18))',
        'input': 'inset 0 0 0 2px var(--color-dark, #15171a)', // from focus:shadow-input
        'dropdown-custom': '0px 4px 5px 0px rgba(13, 10, 44, 0.04), 0px 10px 30px 0px rgba(13, 10, 44, 0.05)',
      },
      blur: {
        xs: 'var(--blur-xs, 4px)',
      },
      transitionTimingFunction: {
        'ease-in': 'var(--ease-in, cubic-bezier(0.4, 0, 1, 1))',
        'ease-in-out': 'var(--ease-in-out, cubic-bezier(0.4, 0, 0.2, 1))',
      },
      zIndex: {
        '1': '1',
        '999': '999',
        '9999': '9999',
        '99999': '99999',
        '999999': '999999',
      },
      // Your CSS variables from :root can be directly used in arbitrary values like bg-[var(--color-primary)]
      // or defined here for shorter class names.
    },
  },
  plugins: [
    // require('@tailwindcss/forms'), // Highly recommended for easier form styling
  ],
};