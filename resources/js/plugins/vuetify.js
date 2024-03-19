import { createVuetify } from 'vuetify'
import { aliases, mdi } from 'vuetify/iconsets/mdi'
import { VuetifyDateAdapter } from 'vuetify/date/adapters/vuetify' 
import ptBR from 'date-fns/locale/pt-BR'

export default createVuetify({
  date: {
    adapter: VuetifyDateAdapter,
    locale: {
      pt: ptBR
    }
  },
  icons: {
    defaultSet: 'mdi',
    aliases,
    sets: {
      mdi,
    }
  },
})