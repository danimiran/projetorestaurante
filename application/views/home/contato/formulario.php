 
 <div class="container">
     <form class="border border-light p-5" method="POST"> 
         <?= validation_errors('<div class="alert alert-danger">', '</div>'); ?>
         <h1 class="mt-0 font-beyond text-center" style="font-size:3rem;">Contato</h1>
         <p class="text-center h4 mb-4 my-3">Tem algum problema, dúvida ou sugestão? Fale diretamente com a gente! Teremos prazer em ajudar.</p>
         <div class="form-row">
             <div class="col-md-6">
                 <input required type="text" id="nome" name="contato[nome]" value="<?= set_value('contato[nome]')?>" class="form-control mb-4" placeholder="Nome">
             </div>
             <div class="col-md-6">
                 <input required type="email" id="email" name="contato[email]" value="<?= set_value('contato[email]')?>" class="form-control mb-4" placeholder="E-mail">
             </div>
         </div>

         <select required class="browser-default custom-select mb-4" id="assunto" name="contato[assunto]">
             <option selected disabled>Selecione o assunto</option>
             <option <?= (set_value('contato[assunto]')  == 'dúvida' ? 'selected' : false) ?> value="dúvida" >Dúvida</option>
             <option <?= (set_value('contato[assunto]')  == 'sugestão' ? 'selected' : false) ?> value="sugestão">Sugestão</option>
             <option <?= (set_value('contato[assunto]')  == 'problema' ? 'selected' : false) ?> value="problema">Problema</option>
         </select>

         <div class="form-group">
             <textarea required class="form-control rounded-0" id="mensagem" name="contato[mensagem]" rows="3" placeholder="Mensagem"><?= set_value('contato[mensagem]')?></textarea>
         </div>

         <div class="dplay-tbl text-center text-white">
             <button class="btn btn-block text-white m-0" style="background-color: #426D49" type="submit">Enviar</button>
         </div>
     </form>
 </div>