import * as validators from '@vuelidate/validators';

export default function useValidations(t) {

  const validationRules = {
    
    email: value => 
        validators.email.$validator(value) || t('validation.email'),
    
    mobile: value => 
        /^09[0-9]{8}$/.test(value) || t('validation.mobile'),
    
    phone: value => 
        /^0[0-9]{9}$/.test(value) || t('validation.phone'),
    
    password: value =>
        (!validators.helpers.req(value) || /^(?=.*[0-9])(?=.*[!@#$%^&*])[a-zA-Z0-9!@#$%^&*]{8,20}$/.test(value)) || t('validation.password'),
    
    required: value => 
        validators.required.$validator(value) || t('validation.required'),
    
    optional: value => 
        /^(?!\s)(?!\s+$).*/.test(value) || t('validation.optional'),
    
    minLength: length => value =>
      validators.minLength(length).$validator(value) || t('validation.minLength', { length }),
    
    maxLength: length => value =>
      validators.maxLength(length).$validator(value) || t('validation.maxLength', { length }),
    
    minValue: min => value =>
      validators.minValue(min).$validator(value) || t('validation.minValue', { min }),
    
    maxValue: max => value =>
      validators.maxValue(max).$validator(value) || t('validation.maxValue', { max }),
    
    alpha: value => 
        validators.alpha.$validator(value) || t('validation.alpha'),
    
    alphaNum: value => 
        validators.alphaNum.$validator(value) || t('validation.alphaNum'),
    
    numeric: value => 
        validators.numeric.$validator(value) || t('validation.numeric'),
    
    integer: value => 
        validators.integer.$validator(value) || t('validation.integer'),
    
    decimal: value => 
        validators.decimal.$validator(value) || t('validation.decimal'),
    
    between: (min, max) => value =>
      validators.between(min, max).$validator(value) || t('validation.between', { min, max }),
    
    url: value => 
        validators.url.$validator(value) || t('validation.url'),
    
    sameAs: comparedValue => value =>
      validators.sameAs(comparedValue).$validator(value) || t('validation.sameAs', {comparedValue}),

    requiredIf: (condition, message = '') => value => 
        validators.requiredIf(condition).$validator(value) || t('validation.requiredIf', { message }),

    requiredUnless: (condition, message = '') => value => 
        validators.requiredUnless(condition).$validator(value) || t('validation.requiredUnless', { message }),

    contains: (param) => (value) =>
        (!helpers.req(value) || value.includes(param)) || t('validation.contains',{ string }),

    startsWith: string => value => 
        (!helpers.req(value) || value.startsWith(string)) || t('validation.startsWith',{ string }),

    endsWith: string => value => 
        (!helpers.req(value) || value.endsWith(string)) || t('validation.endsWith',{ string }),

    beforeOrEqual: toDate => value => 
        (new Date(toDate) >= new Date(value)) || t('validation.beforeOrEqual', { toDate }),

    before: toDate => value => 
        (new Date(toDate) > new Date(value)) || t('validation.before', { toDate }),

    afterOrEqual: fromDate => value => 
        (new Date(fromDate) <= new Date(value)) || t('validation.afterOrEqual', { fromDate }),

    after: fromDate => value => 
        (new Date(fromDate) < new Date(value)) || t('validation.after', { fromDate })

  };

  return validationRules;
}