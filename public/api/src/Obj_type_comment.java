
public class Obj_type_comment {
	public String id;
	public String desc;
	public String updated;
	public String is_disabled;
	public Obj_type_comment(String id, String desc, String updated, String is_disabled) {
		super();
		this.id = id;
		this.desc = desc;
		this.updated = updated;
		this.is_disabled = is_disabled;
	}
	@Override
	public String toString() {
		return "Obj_type_comment [id=" + id + ", desc=" + desc + ", updated=" + updated + ", is_disabled=" + is_disabled
				+ "]";
	}
	
}
