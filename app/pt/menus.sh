#!/bin/bash

wp menu delete sedes-regionais --allow-root
m1=$(wp menu create "Sedes Regionais" --porcelain --allow-root)

wp menu location assign $m1 multisite_aba2 --allow-root
wp menu location assign $m1 master_footer_3 --allow-root

u1=$(wp menu item add-custom $m1 "União Argentina" http://ua.adventistas.org --description="02" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociaciação Argentina Central" http://aac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociaciação Argentina do Norte" http://aan.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociaciação Argentina do Sul" http://aas.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociaciação Bonarense" http://abo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Argentina do Centro Oeste" http://maco.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Argentina do Noroeste" http://mano.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Boliviana" http://ub.adventistas.org --description="03" --porcelain --allow-root)
wp menu item add-custom $m1 "Misão Boliviana Central" http://mbc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Boliviana Occidental" http://mbo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão do Oriente Boliviano" http://mob.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Central Brasileira" http://ucb.adventistas.org --description="05" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Paulista Central" http://apac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Paulista do Vale" http://apv.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Paulista Leste" http://apl.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Paulista Oeste" http://apo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Paulista Sudoeste" http://apso.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Paulista Sul" http://aps.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Paulistana" http://ap.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Paulista Sudeste" http://apse.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Centro-Oeste Brasileira" http://ucob.adventistas.org --description="07" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Brasil Central" http://abc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Mato-Grossense" http://amt.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Planalto Central" http://aplac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Sul Mato-Grossense" http://asm.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão do Tocantins" http://mto.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Chilena" http://uch.adventistas.org --description="12" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociaciação Centro Sul do Chile" http://acsch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociaciação Metropolitana do Chile" http://amch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociaciação Sul Austral do Chile" http://asach.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Central do Chile" http://mcch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Chilena do Pacífico" http://mchp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Norte do Chile" http://mnch.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Sul Metropolitana do Chile" http://msmch.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Ecuatoriana" http://ue.adventistas.org --description="13" --porcelain --allow-root)
wp menu item add-custom $m1 "Misão Ecuatoriana do Norte" http://men.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Ecuatoriana do Sul" http://mes.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Leste Brasileira" http://ulb.adventistas.org --description="11" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Bahia" http://ab.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Bahia Central" http://abac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Bahia Sul" http://abs.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Bahia do Sudoeste" http://mbs.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Sergipe" http://ms.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Bahia Norte" http://mbn.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Nordeste Brasileira" http://uneb.adventistas.org --description="08" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Cearense" http://ace.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Pernambucana" http://ape.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Pernambucana Central" http://apec.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Alagoas" http://misal.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Nordeste" http://mn.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Piauiense" http://mpi.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Noroeste Brasileira" http://unob.adventistas.org --description="10" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Amazonas Roraima" http://aamar.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Amazônia Ocidental" http://aamo.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Central Amazonas" http://aceam.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Sul de Rondônia" http://aSul.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Norte Brasileira" http://unb.adventistas.org --description="09" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Norte do Pará" http://anpa.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Maranhense" http://ama.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Sul do Pará" http://aspa.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Oeste do Pará" http://mopa.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Sul Maranhense" http://msma.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Pará Amapá" http://mpa.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Paraguaya" http://up.adventistas.org --description="14" --porcelain --allow-root)

u1=$(wp menu item add-custom $m1 "União Peruana do Norte" http://upn.adventistas.org --description="15" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociaciação Nor Pacífico do Perú" http://anop.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Asociaciação Peruana Central Este" http://apce.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Centro-Oeste do Perú" http://micop.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Nor Oriental" http://mno.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Peruana do Norte" http://mpn.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Peruana do Sul" http://ups.adventistas.org --description="16" --porcelain --allow-root)
wp menu item add-custom $m1 "Asociaciação Peruana Central" http://apc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Andina Central" http://mac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão do lago Titicaca" http://mlt.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão do Oriente Peruano" http://mop.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Mision Peruana Central Sul" http://mpcs.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Peruana do Sul" http://mps.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Misão Sul Oriental do Perú" http://msop.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Sudeste Brasileira" http://useb.adventistas.org --description="06" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Espírito Santense" http://aes.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Mineira Central" http://amc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Mineira Leste" http://aml.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Mineira Sul" http://ams.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Rio de Janeiro" http://arj.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Rio Fluminense" http://arf.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Rio Sul" http://ars.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Sul Espírito Santense" http://ases.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Mineira Norte" http://mmn.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Sul Brasileira" http://usb.adventistas.org --description="04" --porcelain --allow-root)
wp menu item add-custom $m1 "Associação Catarinense" http://ac.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Central Paranaense" http://acp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Central Sul Rio-Grandense" http://acsr.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Norte Catarinense" http://anc.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Norte Paranaense" http://anp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Sul Paranaense" http://asp.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Sul Rio-Grandense" http://asr.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Missão Ocidental Sul-Rio-Grandense" http://mosr.adventistas.org --parent-id=$u1 --allow-root
wp menu item add-custom $m1 "Associação Oeste Paranaense" http://aop.adventistas.org --parent-id=$u1 --allow-root

u1=$(wp menu item add-custom $m1 "União Uruguaya" http://uu.adventistas.org --description="17" --porcelain --allow-root)