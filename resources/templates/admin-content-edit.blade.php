<div class="admin-content">
    <section class="head-block admin">
        <div class="title-block">
            <div class="title-box">
                <p class="title">Word edit</p>
            </div>
        </div>
    </section>
    <form method="post" action="#" class="form-input admin">
        @csrf
        @method('put')
        <div class="input-box first admin">
            <label for="category" class="input-lable">Category</label>
            <select class="input-text" name="category" id="" >
                <option value=""> - - - </option>
                <option value="sport">Sport</option>
            </select>            
        </div>
        <div class="input-box" name="title-box">
            <label for="title" class="input-lable">Title</label>            
            <input type="text" class="input-text" name="title">              
        </div>
        <div class="input-box" name="source-box">
            <label for="source" class="input-lable">Source</label>
            <select class="input-text" name="source" id="">
                <option value=""> - - - </option>
                <option value="1">Supervisor Fire Fighting Worker</option>
            </select>  
        </div>
        <div class="input-box" name="author-box">
            <label for="author" class="input-lable">Author</label>            
            <input type="text" class="input-text" name="author">              
        </div>
        <div class="input-box" name="description-box">
            <label for="description" class="input-lable">Description</label>
            <textarea class="input-text area" name="description" id=""></textarea>            
        </div>                
        <div class="input-box" name="image-box">
            <div class="input-group">
                <div class="input-box half" name="image-box">
                    <label for="image" class="input-lable">Image</label>            
                    <input type="file" class="input-text file" name="image" accept="image/*" multiple >
                </div>
                <div class="input-box mini" name="status-box">
                    <label for="status" class="input-lable">Status</label>            
                    <select class="input-text" name="status" id="">
                        <option value="draft">DRAFT</option>
                    </select>              
                </div> 
            </div>
        </div>
        <div class="input-box" name="dates-box">
            <div class="input-group">
                <div class="input-box mini" name="created-box">
                    <label for="created" class="input-lable">Created at</label> 
                    <input type="text" class="input-text dates" name="created" readonly >           
                </div> 
                <div class="input-box mini" name="updated-box">
                    <label for="updated" class="input-lable">Updated at</label> 
                    <input type="text" class="input-text dates" name="updated" readonly >           
                </div>                        
            </div>
        </div>
        <div class="input-box" name="btns-box">
            <div class="input-group">
                <button type="submit" class="btn-form">Save & close</button>
                <a href="">    
                    <button type="reset" class="btn-form cancel">Cancel</button>
                </a>
            </div>
        </div> 
    </form>
</div> 