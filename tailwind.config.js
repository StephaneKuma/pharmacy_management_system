module.exports = {
  theme: {
    extend: {
      spacing: {
        '72': '18rem',
        '80': '20rem',
      },
      customForms: theme => ({
        default: {
          input: {
            borderRadius: theme('borderRadius.lg'),
            backgroundColor: theme('colors.gray.200'),
            '&:focus': {
              backgroundColor: theme('colors.white'),
              outline: 'none'
            }
          },
          select: {
            borderRadius: theme('borderRadius.lg'),
            backgroundColor: theme('colors.gray.700'),
            boxShadow: theme('boxShadow.default'),
            lineHeight: theme('lineHeight.snug'),
            borderColor: 'transparent',
            '&:focus': {
              boxShadow: 'none',
              borderColor: 'none',
            },
            icon: '<svg fill="#fff" xmlns="http://www.w3.org/2000/svg" viewBox="0 0 20 20"><path d="M9.293 12.95l.707.707L15.657 8l-1.414-1.414L10 10.828 5.757 6.586 4.343 8z"/></svg>'
          },
          checkbox: {
            width: theme('spacing.6'),
            height: theme('spacing.6'),
            size: '1.5em',
            borderColor: 'transparent',
            '&:focus': {
              boxShadow: 'none',
              borderColor: 'none',
            },
          },

          radio: {
            borderColor: 'transparent',
            '&:focus': {
              boxShadow: 'none',
              borderColor: 'none',
            },
          }
        }
      })
    }
  },
  variants: {},
  plugins: [
      require('@tailwindcss/custom-forms')
  ]
};
